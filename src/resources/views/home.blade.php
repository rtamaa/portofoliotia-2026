<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Portfolio - Focus Timer Project</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Crimson+Pro:wght@300;400;600;700&family=Archivo:wght@300;400;600;900&display=swap" rel="stylesheet">
    @vite(['resources/css/app.css'])
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Archivo', sans-serif; background: #0a0a0a; color: #fff; }
        
        /* Header - navbar horizontal ke samping (berjajar) */
        header{
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 118px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 4rem;
            z-index: 999;
            background: #1d1d1f;
            border-bottom: 1px solid rgba(255,255,255,0.05);
        }
        .logo { display: flex; align-items: center; gap: 0.75rem; text-decoration: none; color: #fff; font-weight: 600; letter-spacing: 1px; }
        .logo-icon { width: 40px; height: 40px; }
        
        /* DESKTOP NAV - menu berjajar ke samping (horizontal) */
        .desktop-nav{
            display:flex;
            align-items:center;
        }

        .desktop-nav ul{
            display:flex;
            align-items:center;
            gap: 4rem;
            list-style:none;
            margin:0;
            padding:0;
        }
        .desktop-nav a{
            text-decoration:none;
            color:#8d8d8d;
            font-weight:500;
            transition:.3s;
            font-size:1rem;
            letter-spacing:.5px;
        }
        .desktop-nav a:hover{
            color:#fff;
        }
        .desktop-nav a.active{
            color:#fff;
            position:relative;
        }

        .desktop-nav a.active::after{
            display:none;
        }
        
        .menu-icon { display: none; cursor: pointer; width: 30px; height: 20px; flex-direction: column; justify-content: space-between; }
        .menu-icon span { width: 100%; height: 2px; background: #fff; transition: 0.3s; }
        
        /* Split Container */
        .split-container{
            display:flex;
            min-height:100vh;
            padding-top:118px;
        }
        .left-panel { flex: 1; position: relative; overflow: hidden; }
        .image-container { position: absolute; top: 0; left: 0; width: 100%; height: 100%; opacity: 0; transition: opacity 0.5s ease; }
        .image-container.active { opacity: 1; z-index: 1; }
        .project-image { width: 100%; height: 100%; background-size: cover; background-position: center; }
        .right-panel { flex: 1; display: flex; align-items: center; justify-content: center; padding: 4rem; background: #0a0a0a; overflow-y: auto; }
        .project-details { display: none; max-width: 500px; }
        .project-details.active { display: block; }
        .project-number { font-size: 0.875rem; letter-spacing: 2px; color: #ff3366; margin-bottom: 1.5rem; }
        .project-title { font-size: 3rem; font-weight: 700; margin-bottom: 1rem; font-family: 'Crimson Pro', serif; }
        .project-category { display: inline-block; color: #ff3366; margin-bottom: 1.5rem; }
        .project-description { color: #ccc; line-height: 1.6; margin-bottom: 2rem; }
        .project-info { display: flex; gap: 2rem; margin-bottom: 2rem; }
        .info-item h4 { font-size: 0.75rem; letter-spacing: 1px; color: #666; margin-bottom: 0.5rem; }
        .info-item p { color: #fff; }
        .project-tags { display: flex; flex-wrap: wrap; gap: 0.5rem; margin-bottom: 2rem; }
        .tag { background: rgba(255,51,102,0.1); color: #ff3366; padding: 0.25rem 0.75rem; border-radius: 20px; font-size: 0.75rem; }
        .view-project-btn { display: inline-block; background: #ff3366; color: #fff; text-decoration: none; padding: 0.75rem 1.5rem; border-radius: 30px; transition: background 0.3s; }
        .view-project-btn:hover { background: #e62e5c; }

        /* Controls */
        .project-controls{
            position:absolute;
            top:118px;
            right:0;
            width:auto;
            height:auto;
            background:transparent;
            display:flex;
            align-items:center;
            justify-content:flex-end;
            z-index:20;
        }

        .progress-indicator{
            display:none;
        }

        .navigation{
            display:flex;
            gap:0;
            margin-right:0;
        }

        .nav-arrow{
            width:56px;
            height:50px;
            border:1px solid rgba(255,255,255,0.12);
            display:flex;
            align-items:center;
            justify-content:center;
            cursor:pointer;
            transition:.3s;
            border-radius:0;
            background:#2a2a2a;
            backdrop-filter:none;
        }

        .nav-arrow + .nav-arrow{
            border-left:none;
        }

        .nav-arrow:hover{
            background:#333;
        }

        .arrow{
            width:14px;
            height:14px;
            border-top:2px solid #fff;
            border-right:2px solid #fff;
        }

        .arrow-left{
            transform:rotate(-135deg);
        }

        .arrow-right{
            transform:rotate(45deg);
        }
        
        /* About Section */
        .about-section { min-height: 100vh; background: #111; padding: 5rem 2rem; }
        .about-split { display: flex; max-width: 1200px; margin: 0 auto; gap: 4rem; }
        .about-content { flex: 1; }
        .about-content h2 { font-size: 2.5rem; margin-bottom: 1.5rem; font-family: 'Crimson Pro', serif; }
        .about-content p { color: #ccc; line-height: 1.6; margin-bottom: 1.5rem; }
        .about-stats { display: flex; gap: 2rem; margin-top: 2rem; }
        .stat-item h3 { font-size: 2rem; color: #ff3366; }
        .stat-item p { color: #666; }
        .about-image { flex: 1; background: linear-gradient(135deg, #ff3366, #ff6b9d); border-radius: 20px; min-height: 400px; }
        
        /* Services Section */
        .services-section { min-height: 100vh; background: #0a0a0a; padding: 5rem 2rem; }
        .services-container { max-width: 1200px; margin: 0 auto; }
        .section-header { text-align: center; margin-bottom: 4rem; }
        .section-header h2 { font-size: 2.5rem; font-family: 'Crimson Pro', serif; }
        .services-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 2rem; }
        .service-card { background: #111; padding: 2rem; border-radius: 20px; border: 1px solid #222; transition: 0.3s; }
        .service-card:hover { border-color: #ff3366; transform: translateY(-5px); }
        .service-number { font-size: 3rem; font-weight: 700; color: rgba(255,51,102,0.2); margin-bottom: 1rem; }
        .service-card h3 { margin-bottom: 1rem; }
        .service-card p { color: #999; line-height: 1.6; }
        
        /* Contact Section */
        .contact-section { min-height: 100vh; background: #111; padding: 5rem 2rem; }
        .contact-split { display: flex; max-width: 1200px; margin: 0 auto; gap: 4rem; }
        .contact-info { flex: 1; }
        .contact-info h2 { font-size: 2.5rem; margin-bottom: 1.5rem; font-family: 'Crimson Pro', serif; }
        .contact-info p { color: #ccc; margin-bottom: 2rem; }
        .contact-details { margin-bottom: 2rem; }
        .contact-item { display: flex; gap: 1rem; margin-bottom: 1rem; }
        .contact-item-icon { font-size: 1.5rem; }
        .contact-item-content h4 { font-size: 0.75rem; letter-spacing: 1px; color: #666; }
        .contact-item-content a { color: #fff; text-decoration: none; }
        .social-links { display: flex; gap: 1rem; }
        .social-link { color: #fff; text-decoration: none; transition: color 0.3s; }
        .social-link:hover { color: #ff3366; }
        .contact-form { flex: 1; }
        .form-group { margin-bottom: 1.5rem; }
        .form-group label { display: block; margin-bottom: 0.5rem; font-size: 0.875rem; color: #999; }
        .form-group input, .form-group textarea { width: 100%; padding: 0.75rem; background: #1a1a1a; border: 1px solid #333; border-radius: 8px; color: #fff; }
        .form-group input:focus, .form-group textarea:focus { outline: none; border-color: #ff3366; }
        .submit-btn { background: #ff3366; color: #fff; border: none; padding: 0.75rem 2rem; border-radius: 30px; cursor: pointer; transition: 0.3s; }
        .submit-btn:hover { background: #e62e5c; }
        
        footer { text-align: center; padding: 2rem; background: #0a0a0a; border-top: 1px solid #222; color: #666; }
        
        @media (max-width: 768px) {
            .split-container { flex-direction: column; }
            .left-panel { height: 50vh; }
            .right-panel { padding: 2rem; }
            .about-split, .contact-split, .services-grid { flex-direction: column; }
            .services-grid { grid-template-columns: 1fr; }
            .desktop-nav { display: none; }
            .menu-icon { display: flex; }
        }
        
        .mobile-nav { position: fixed; top: 0; right: -100%; width: 80%; max-width: 400px; height: 100%; background: #0a0a0a; z-index: 200; padding: 2rem; transition: right 0.3s ease; box-shadow: -5px 0 20px rgba(0,0,0,0.5); }
        .mobile-nav.active { right: 0; }
        .mobile-nav-close { position: absolute; top: 1rem; right: 1rem; background: none; border: none; color: #fff; font-size: 2rem; cursor: pointer; }
        .mobile-nav ul { list-style: none; margin-top: 4rem; }
        .mobile-nav li { margin-bottom: 1.5rem; }
        .mobile-nav a { color: #fff; text-decoration: none; font-size: 1.25rem; }
        .mobile-nav-footer { position: absolute; bottom: 2rem; left: 2rem; right: 2rem; }
        .mobile-nav-footer p { color: #666; margin-bottom: 1rem; }
        .mobile-nav-footer a { color: #ff3366; text-decoration: none; }
    </style>
</head>
<body>
    <header>
        <a href="#work" class="logo">
            <svg class="logo-icon" viewBox="0 0 100 100" xmlns="http://www.w3.org/2000/svg">
                <circle cx="50" cy="50" r="45" fill="none" stroke="#ff3366" stroke-width="3"/>
                <path d="M 30 40 L 50 60 L 70 40" fill="none" stroke="#ff3366" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"/>
                <circle cx="50" cy="70" r="3" fill="#ff3366"/>
            </svg>
            <span>Portfolio</span>
        </a>
        <nav class="desktop-nav">
            <ul>
                <li><a href="#work" class="nav-menu-link active">Work</a></li>
                <li><a href="#about" class="nav-menu-link">About</a></li>
                <li><a href="#services" class="nav-menu-link">Services</a></li>
                <li><a href="#contact" class="nav-menu-link">Contact</a></li>
            </ul>
        </nav>
        <div class="menu-icon"><span></span><span></span><span></span></div>
    </header>

    <div class="mobile-nav">
        <button class="mobile-nav-close">&times;</button>
        <ul>
            <li><a href="#work">Work</a></li>
            <li><a href="#about">About</a></li>
            <li><a href="#services">Services</a></li>
            <li><a href="#contact">Contact</a></li>
        </ul>
        <div class="mobile-nav-footer">
            <p>Let's create something amazing together</p>
            <a href="/cdn-cgi/l/email-protection">[email&#160;protected]</a>
        </div>
    </div>

    <div class="split-container" id="work">
        <div class="left-panel">
            @forelse($projects as $index => $project)
            <div class="image-container {{ $index === 0 ? 'active' : '' }}" data-project="{{ $index }}">
                <div class="project-image" style="background-image: url('{{ $project->image_url ?? 'https://images.unsplash.com/photo-1558655146-9f40138edfeb?w=800&h=1000&fit=crop' }}'); background-size: cover; background-position: center;"></div>
            </div>
            @empty
            <div class="image-container active" data-project="0">
                <div class="project-image" style="background-image: url('https://images.unsplash.com/photo-1558655146-9f40138edfeb?w=800&h=1000&fit=crop');"></div>
            </div>
            @endforelse
        </div>

        <div class="right-panel">
            @forelse($projects as $index => $project)
            <div class="project-details {{ $index === 0 ? 'active' : '' }}" data-project="{{ $index }}">
                <div class="project-number">{{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }} / {{ str_pad($projects->count(), 2, '0', STR_PAD_LEFT) }}</div>
                <h1 class="project-title">{{ $project->title }}</h1>
                <span class="project-category">{{ $project->category }}</span>
                <p class="project-description">{{ $project->description }}</p>
                <div class="project-info">
                    <div class="info-item"><h4>Client</h4><p>{{ $project->client }}</p></div>
                    <div class="info-item"><h4>Year</h4><p>{{ $project->year }}</p></div>
                    <div class="info-item"><h4>Role</h4><p>{{ $project->role }}</p></div>
                </div>
                <div class="project-tags">
                    @foreach(json_decode($project->tags ?? '[]') as $tag)
                    <span class="tag">{{ $tag }}</span>
                    @endforeach
                </div>
                <a href="{{ $project->detail_url ?? '#' }}" class="view-project-btn">Lihat Detail Proyek →</a>
            </div>
            @empty
            <div class="project-details active" data-project="0">
                <div class="project-number">01 / 01</div>
                <h1 class="project-title">Rancang Bangun Aplikasi Pengatur Jadwal Belajar</h1>
                <span class="project-category">Focus Timer & Task Management</span>
                <p class="project-description">Aplikasi web pengatur jadwal belajar berbasis focus timer yang mengintegrasikan teknik Pomodoro untuk membantu mahasiswa mengelola tugas akademik, meningkatkan fokus belajar, dan mengurangi perilaku prokrastinasi.</p>
                <div class="project-info">
                    <div class="info-item"><h4>Client</h4><p>Tugas Akhir</p></div>
                    <div class="info-item"><h4>Year</h4><p>2026</p></div>
                    <div class="info-item"><h4>Role</h4><p>Full-stack Developer</p></div>
                </div>
                <div class="project-tags">
                    <span class="tag">Laravel 11</span>
                    <span class="tag">Livewire 3</span>
                    <span class="tag">Filament Admin</span>
                    <span class="tag">REST API</span>
                    <span class="tag">Pomodoro Timer</span>
                </div>
                <a href="/project/focus-timer" class="view-project-btn">Lihat Detail Proyek →</a>
            </div>
            @endforelse
        </div>

        <div class="project-controls">
            <div class="progress-indicator">
    <span id="currentProject">01</span>
    <span style="margin:0 10px;">/</span>
    <span>
        {{ str_pad($projects->count(), 2, '0', STR_PAD_LEFT) }}
    </span>
</div>

            <div class="navigation">
                <div class="nav-arrow" id="prevBtn"><div class="arrow arrow-left"></div></div>
                <div class="nav-arrow" id="nextBtn"><div class="arrow arrow-right"></div></div>
            </div>
        </div>
    </div>

    <section id="about" class="about-section">
        <div class="about-split">
            <div class="about-content">
                <h2>Tentang Saya</h2>
                <p>Saya adalah mahasiswa Teknik Informatika Universitas Esa Unggul semester akhir yang memiliki minat di bidang pengembangan web dan mobile. Saat ini sedang mengerjakan project akhir berupa aplikasi Focus Timer untuk membantu mahasiswa mengelola waktu belajar.</p>
                <p>Tech stack yang dikuasai: Laravel, Livewire, Filament, REST API, MySQL/MariaDB, Flutter, dan Tailwind CSS. Saya percaya bahwa teknologi dapat membantu meningkatkan produktivitas dan efisiensi dalam berbagai aspek kehidupan.</p>
                <div class="about-stats">
                    <div class="stat-item"><h3>5+</h3><p>Projects</p></div>
                    <div class="stat-item"><h3>3+</h3><p>Years</p></div>
                    <div class="stat-item"><h3>2026</h3><p>Graduation</p></div>
                </div>
            </div>
            <div class="about-image"></div>
        </div>
    </section>

    <section id="services" class="services-section">
        <div class="services-container">
            <div class="section-header">
                <h2>Layanan Saya</h2>
                <p>Layanan pengembangan yang sesuai dengan kebutuhan Anda</p>
            </div>
            <div class="services-grid">
                <div class="service-card">
                    <div class="service-number">01</div>
                    <h3>Web Development</h3>
                    <p>Membangun website dinamis dengan Laravel, Livewire, dan Filament Admin Panel.</p>
                </div>
                <div class="service-card">
                    <div class="service-number">02</div>
                    <h3>Mobile Development</h3>
                    <p>Mengembangkan aplikasi mobile dengan Flutter yang terintegrasi dengan REST API.</p>
                </div>
                <div class="service-card">
                    <div class="service-number">03</div>
                    <h3>API Development</h3>
                    <p>Membuat REST API dengan Laravel Sanctum untuk integrasi aplikasi.</p>
                </div>
            </div>
        </div>
    </section>

    <section id="contact" class="contact-section">
        <div class="contact-split">
            <div class="contact-info">
                <h2>Mari Bekerja Sama</h2>
                <p>Ada project dalam pikiran? Hubungi saya dan mari kita ciptakan sesuatu yang luar biasa bersama.</p>
                <div class="contact-details">
                    <div class="contact-item">
                        <div class="contact-item-icon">📧</div>
                        <div class="contact-item-content">
                            <h4>Email</h4>
                            <a href="mailto:yourname@example.com">yourname@example.com</a>
                        </div>
                    </div>
                    <div class="contact-item">
                        <div class="contact-item-icon">📍</div>
                        <div class="contact-item-content">
                            <h4>Location</h4>
                            <a href="#">Jakarta, Indonesia</a>
                        </div>
                    </div>
                </div>
                <div class="social-links">
                    <a href="#" class="social-link">GitHub</a>
                    <a href="#" class="social-link">LinkedIn</a>
                    <a href="#" class="social-link">Instagram</a>
                </div>
            </div>
            <form class="contact-form" id="contactForm">
                @csrf
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" required>
                </div>
                <div class="form-group">
                    <label for="subject">Subject</label>
                    <input type="text" id="subject" name="subject" required>
                </div>
                <div class="form-group">
                    <label for="message">Message</label>
                    <textarea id="message" name="message" rows="5" required></textarea>
                </div>
                <button type="submit" class="submit-btn">Send Message</button>
            </form>
        </div>
    </section>

    <footer>
        <p>Copyright © 2026 Your Portfolio. All rights reserved.</p>
    </footer>

    <script>
        // ========== PROJECT SLIDER ==========
        document.addEventListener('DOMContentLoaded', function() {
            const imageContainers = document.querySelectorAll('.image-container');
            const projectDetails = document.querySelectorAll('.project-details');
            const dots = document.querySelectorAll('.progress-dot');
            const prevBtn = document.getElementById('prevBtn');
            const nextBtn = document.getElementById('nextBtn');
            let currentIndex = 0;
            const totalProjects = imageContainers.length;

            function showProject(index) {
                if (totalProjects === 0) return;
                
                imageContainers.forEach(el => el.classList.remove('active'));
                projectDetails.forEach(el => el.classList.remove('active'));
                
                if (imageContainers[index]) imageContainers[index].classList.add('active');
                if (projectDetails[index]) projectDetails[index].classList.add('active');
                
                dots.forEach((dot, i) => {
                    if (i === index) dot.classList.add('active');
                    else dot.classList.remove('active');
                });
                
                currentIndex = index;
                const currentProject = document.getElementById('currentProject');
                if(currentProject){
                    currentProject.innerText = String(index + 1).padStart(2,'0');
                }
            }

            function nextProject() {
                if (totalProjects === 0) return;
                let next = (currentIndex + 1) % totalProjects;
                showProject(next);
            }

            function prevProject() {
                if (totalProjects === 0) return;
                let prev = (currentIndex - 1 + totalProjects) % totalProjects;
                showProject(prev);
            }

            if (prevBtn) prevBtn.addEventListener('click', prevProject);
            if (nextBtn) nextBtn.addEventListener('click', nextProject);
            
            dots.forEach((dot, i) => {
                dot.addEventListener('click', () => showProject(i));
            });

            // Keyboard navigation
            document.addEventListener('keydown', function(e) {
                if (e.key === 'ArrowLeft') prevProject();
                if (e.key === 'ArrowRight') nextProject();
            });
        });

        // ========== MOBILE MENU ==========
        const menuIcon = document.querySelector('.menu-icon');
        const mobileNav = document.querySelector('.mobile-nav');
        const closeNav = document.querySelector('.mobile-nav-close');

        if (menuIcon) menuIcon.addEventListener('click', () => mobileNav.classList.add('active'));
        if (closeNav) closeNav.addEventListener('click', () => mobileNav.classList.remove('active'));

        // ========== ACTIVE NAV MENU ON SCROLL ==========
        const sections = document.querySelectorAll('section, .split-container');
        const navLinks = document.querySelectorAll('.nav-menu-link');

        window.addEventListener('scroll', () => {
            let current = '';
            const scrollPosition = window.scrollY + 100;
            
            sections.forEach(section => {
                const sectionTop = section.offsetTop;
                const sectionHeight = section.clientHeight;
                if (scrollPosition >= sectionTop && scrollPosition < sectionTop + sectionHeight) {
                    current = section.getAttribute('id');
                }
            });
            
            // Also check for #work (split-container)
            const workSection = document.getElementById('work');
            if (workSection) {
                const workTop = workSection.offsetTop;
                const workBottom = workTop + workSection.clientHeight;
                if (scrollPosition >= workTop && scrollPosition < workBottom) {
                    current = 'work';
                }
            }
            
            navLinks.forEach(link => {
                link.classList.remove('active');
                const href = link.getAttribute('href').substring(1);
                if (href === current) {
                    link.classList.add('active');
                }
            });
        });

        // ========== CONTACT FORM AJAX ==========
        const contactForm = document.getElementById('contactForm');
        if (contactForm) {
            contactForm.addEventListener('submit', async (e) => {
                e.preventDefault();
                const formData = new FormData(e.target);
                try {
                    const response = await fetch('{{ route("contact.send") }}', {
                        method: 'POST',
                        headers: { 'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content },
                        body: formData
                    });
                    const result = await response.json();
                    alert(result.message);
                    if (result.success) e.target.reset();
                } catch (error) {
                    console.error('Error:', error);
                    alert('Terjadi kesalahan, silakan coba lagi.');
                }
            });
        }
    </script>
</body>
</html>