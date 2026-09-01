<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - ZACNUS</title>
    <!-- Tailwind CSS CDN -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- FontAwesome Icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: {
                        sans: ['Plus Jakarta Sans', 'sans-serif'],
                    },
                    colors: {
                        accent: {
                            DEFAULT: '#E61C1C',
                            hover: '#C81313',
                            light: '#FFF0EB',
                        },
                        dark: {
                            bg: '#0D0F12',
                            card: '#16191E',
                            border: '#242830',
                            hero: '#121419',
                        }
                    }
                }
            }
        }
    </script>
</head>
<body class="bg-dark-bg text-gray-300 font-sans antialiased selection:bg-accent selection:text-white">

    <!-- HEADER / NAVBAR -->
    <header class="fixed top-0 left-0 w-full z-50 bg-dark-bg/80 backdrop-blur-md border-b border-dark-border/50">
        <div class="max-w-7xl mx-auto px-6 h-20 flex items-center justify-between">
            <a href="{{ url('/') }}" class="flex items-center gap-3 group">
                <div class="h-9 w-9 bg-accent rounded-lg flex items-center justify-center p-1.5 shadow-md shadow-accent/20 group-hover:scale-105 transition-transform duration-300">
                    <img src="{{ asset('image/logo-mark.png') }}" alt="ZACNUS Mark" class="w-full h-full object-contain">
                </div>
                <span class="text-xl font-extrabold tracking-wider text-white uppercase group-hover:text-accent transition-colors duration-300">
                    ZACNUS
                </span>
            </a>

            <a href="{{ url('/') }}" class="text-xs font-bold text-gray-400 hover:text-white flex items-center gap-2 transition">
                <i class="fa-solid fa-house text-accent"></i> Back to Home
            </a>
        </div>
    </header>

    <!-- HERO SECTION -->
    <section class="pt-36 pb-12 bg-dark-hero/40 border-b border-dark-border text-center">
        <div class="max-w-4xl mx-auto px-6">
            <span class="text-xs font-bold uppercase tracking-widest text-accent bg-accent/10 px-3 py-1 rounded">
                Get In Touch
            </span>
            <h1 class="text-3xl sm:text-5xl font-extrabold text-white mt-4 leading-tight">
                Let’s Build Something <span class="text-accent">Great Together</span>
            </h1>
            <p class="text-gray-400 text-xs sm:text-sm mt-3 max-w-xl mx-auto">
                Have a project in mind, need technical advice, or want to discuss a custom solution? Drop us a line below.
            </p>
        </div>
    </section>

    <!-- CONTACT FORM & INFO GRID -->
    <section class="py-16 max-w-7xl mx-auto px-6 grid lg:grid-cols-12 gap-12">
        <!-- Left Side: Contact Information Cards -->
        <div class="lg:col-span-5 space-y-6">
            <div class="bg-dark-card border border-dark-border rounded-2xl p-8 space-y-6">
                <h2 class="text-xl font-bold text-white">Contact Details</h2>
                <p class="text-xs text-gray-400">Reach out directly via email or visit our software studio.</p>

                <div class="space-y-4 pt-4">
                    <div class="flex items-start gap-4">
                        <div class="h-10 w-10 bg-dark-bg border border-dark-border text-accent rounded-xl flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-location-dot text-sm"></i>
                        </div>
                        <div>
                            <span class="text-[11px] text-gray-500 uppercase tracking-wider block">Address</span>
                            <p class="text-xs font-semibold text-white mt-0.5">Software Park, Tech Zone, Karachi, Pakistan</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="h-10 w-10 bg-dark-bg border border-dark-border text-accent rounded-xl flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-envelope text-sm"></i>
                        </div>
                        <div>
                            <span class="text-[11px] text-gray-500 uppercase tracking-wider block">Email Us</span>
                            <p class="text-xs font-semibold text-white mt-0.5">contact@zacnus.com</p>
                        </div>
                    </div>

                    <div class="flex items-start gap-4">
                        <div class="h-10 w-10 bg-dark-bg border border-dark-border text-accent rounded-xl flex items-center justify-center shrink-0">
                            <i class="fa-solid fa-phone text-sm"></i>
                        </div>
                        <div>
                            <span class="text-[11px] text-gray-500 uppercase tracking-wider block">Call Us</span>
                            <p class="text-xs font-semibold text-white mt-0.5">+92 (300) 123-4567</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Working Hours Card -->
            <div class="bg-dark-card border border-dark-border rounded-2xl p-6 space-y-3">
                <h3 class="text-sm font-bold text-white">Business Hours</h3>
                <div class="flex justify-between text-xs text-gray-400">
                    <span>Monday - Friday</span>
                    <span class="text-white font-medium">9:00 AM - 6:00 PM</span>
                </div>
                <div class="flex justify-between text-xs text-gray-400">
                    <span>Saturday - Sunday</span>
                    <span class="text-accent font-medium">Closed</span>
                </div>
            </div>
        </div>

        <!-- Right Side: Contact Form -->
        <div class="lg:col-span-7">
            <div class="bg-dark-card border border-dark-border rounded-2xl p-8">
                <h2 class="text-xl font-bold text-white mb-6">Send Us a Message</h2>

                <form action="#" method="POST" class="space-y-5">
                    @csrf
                    <div class="grid sm:grid-cols-2 gap-5">
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Your Name</label>
                            <input type="text" required placeholder="John Doe" class="w-full bg-dark-bg border border-dark-border rounded-xl px-4 py-3 text-xs text-white focus:outline-none focus:border-accent transition">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Email Address</label>
                            <input type="email" required placeholder="john@example.com" class="w-full bg-dark-bg border border-dark-border rounded-xl px-4 py-3 text-xs text-white focus:outline-none focus:border-accent transition">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Subject / Requirement</label>
                        <select class="w-full bg-dark-bg border border-dark-border rounded-xl px-4 py-3 text-xs text-white focus:outline-none focus:border-accent transition">
                            <option value="web">Web Application Development</option>
                            <option value="custom">Custom Software Development</option>
                            <option value="uiux">UI/UX Design & Branding</option>
                            <option value="other">Other Inquiry</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-gray-400 uppercase tracking-wider mb-2">Project Details / Message</label>
                        <textarea rows="5" required placeholder="Describe your project scope, goals, or questions..." class="w-full bg-dark-bg border border-dark-border rounded-xl p-4 text-xs text-white focus:outline-none focus:border-accent transition"></textarea>
                    </div>

                    <button type="submit" class="w-full bg-accent hover:bg-accent-hover text-white text-xs font-bold py-4 rounded-xl transition shadow-lg shadow-accent/20">
                        Submit Inquiry
                    </button>
                </form>
            </div>
        </div>
    </section>

    <!-- FOOTER -->
    <footer class="bg-dark-hero border-t border-dark-border mt-20 pt-12 pb-8 text-xs text-gray-400">
        <div class="max-w-7xl mx-auto px-6 flex flex-col sm:flex-row items-center justify-between gap-4 text-[11px] text-gray-500">
            <p>© 2026 ZACNUS. All rights reserved.</p>
            <a href="{{ url('/') }}" class="hover:text-white">Home</a>
        </div>
    </footer>

</body>
</html>