#!/usr/bin/env bash
# Runs on the VPS after GitHub copies docker-compose.prod.yml here.
# No git/deploy key. Image is pulled from GHCR.
set -euo pipefail

DEPLOY_PATH="${DEPLOY_PATH:?DEPLOY_PATH is required}"
IMAGE="${ZECNUS_IMAGE:?ZECNUS_IMAGE is required}"
GHCR_USER="${GHCR_USER:?GHCR_USER is required}"
GHCR_TOKEN="${GHCR_TOKEN:?GHCR_TOKEN is required}"

mkdir -p "${DEPLOY_PATH}"
cd "${DEPLOY_PATH}"

if [[ ! -f docker-compose.yml ]]; then
  echo "docker-compose.yml missing at ${DEPLOY_PATH}" >&2
  exit 1
fi

if [[ ! -f .env ]]; then
  echo "Create ${DEPLOY_PATH}/.env on the VPS once (APP_KEY, DB passwords). Refusing to start without it." >&2
  exit 1
fi

echo "${GHCR_TOKEN}" | docker login ghcr.io -u "${GHCR_USER}" --password-stdin
export ZECNUS_IMAGE="${IMAGE}"
docker compose pull
docker compose up -d --wait --remove-orphans
echo "Deployed ${IMAGE}"
