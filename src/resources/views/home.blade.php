<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $setting?->hero_title ?? 'Portfolio' }}</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">

    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Crimson+Pro:wght@300;400;600;700&family=Archivo:wght@300;400;600;900&display=swap" rel="stylesheet">

    @vite(['resources/css/app.css'])

    <style>

        *{
            margin:0;
            padding:0;
            box-sizing:border-box;
        }

        body{
            font-family:'Archivo',sans-serif;
            background:#0a0a0a;
            color:#fff;
        }

        header{
            position:fixed;
            top:0;
            left:0;
            right:0;
            height:118px;
            display:flex;
            justify-content:space-between;
            align-items:center;
            padding:0 4rem;
            z-index:999;
            background:#1d1d1f;
            border-bottom:1px solid rgba(255,255,255,0.05);
        }

        .logo{
            display:flex;
            align-items:center;
            gap:.75rem;
            text-decoration:none;
            color:#fff;
            font-weight:600;
            letter-spacing:1px;
        }

        .logo-icon{
            width:40px;
            height:40px;
        }

        .desktop-nav{
            display:flex;
            align-items:center;
        }

        .desktop-nav ul{
            display:flex;
            align-items:center;
            gap:4rem;
            list-style:none;
        }

        .desktop-nav a{
            text-decoration:none;
            color:#8d8d8d;
            transition:.3s;
        }

        .desktop-nav a:hover,
        .desktop-nav a.active{
            color:#fff;
        }

        .split-container{
            display:flex;
            min-height:100vh;
            padding-top:118px;
        }

        .left-panel{
            flex:1;
            position:relative;
            overflow:hidden;
        }

        .image-container{
            position:absolute;
            inset:0;
            opacity:0;
            transition:.5s;
        }

        .image-container.active{
            opacity:1;
            z-index:1;
        }

        .project-image{
            width:100%;
            height:100%;
            background-size:cover;
            background-position:center;
        }

        .right-panel{
            flex:1;
            display:flex;
            align-items:center;
            justify-content:center;
            padding:4rem;
            background:#0a0a0a;
        }

        .project-details{
            display:none;
            max-width:500px;
        }

        .project-details.active{
            display:block;
        }

        .project-number{
            font-size:.875rem;
            letter-spacing:2px;
            color:#ff3366;
            margin-bottom:1.5rem;
        }

        .project-title{
            font-size:3rem;
            font-weight:700;
            margin-bottom:1rem;
            font-family:'Crimson Pro',serif;
        }

        .project-category{
            display:inline-block;
            color:#ff3366;
            margin-bottom:1.5rem;
        }

        .project-description{
            color:#ccc;
            line-height:1.6;
            margin-bottom:2rem;
        }

        .project-tags{
            display:flex;
            flex-wrap:wrap;
            gap:.5rem;
            margin-bottom:2rem;
        }

        .tag{
            background:rgba(255,51,102,.1);
            color:#ff3366;
            padding:.25rem .75rem;
            border-radius:20px;
            font-size:.75rem;
        }

        .view-project-btn{
            display:inline-block;
            background:#ff3366;
            color:#fff;
            text-decoration:none;
            padding:.75rem 1.5rem;
            border-radius:30px;
        }

        .project-controls{
            position:absolute;
            top:118px;
            right:0;
            z-index:20;
        }

        .navigation{
            display:flex;
        }

        .nav-arrow{
            width:56px;
            height:50px;
            background:#2a2a2a;
            border:1px solid rgba(255,255,255,.1);
            display:flex;
            justify-content:center;
            align-items:center;
            cursor:pointer;
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

        .about-section,
        .services-section,
        .contact-section{
            min-height:100vh;
            padding:5rem 2rem;
        }

        .about-section{
            background:#111;
        }

        .services-section{
            background:#0a0a0a;
        }

        .contact-section{
            background:#111;
        }

        .about-split,
        .contact-split{
            display:flex;
            max-width:1200px;
            margin:auto;
            gap:4rem;
        }

        .about-content,
        .contact-info,
        .contact-form{
            flex:1;
        }

        .about-content h2,
        .contact-info h2,
        .section-header h2{
            font-size:2.5rem;
            margin-bottom:1.5rem;
            font-family:'Crimson Pro',serif;
        }

        .about-content p,
        .contact-info p{
            color:#ccc;
            line-height:1.6;
            margin-bottom:1.5rem;
        }

        .services-container{
            max-width:1200px;
            margin:auto;
        }

        .section-header{
            text-align:center;
            margin-bottom:4rem;
        }

        .services-grid{
            display:grid;
            grid-template-columns:repeat(3,1fr);
            gap:2rem;
        }

        .service-card{
            background:#111;
            padding:2rem;
            border-radius:20px;
            border:1px solid #222;
        }

        .service-number{
            font-size:3rem;
            font-weight:700;
            color:rgba(255,51,102,.2);
            margin-bottom:1rem;
        }

        .social-links{
            display:flex;
            gap:1rem;
        }

        .social-link{
            color:#fff;
            text-decoration:none;
        }

        .form-group{
            margin-bottom:1.5rem;
        }

        .form-group input,
        .form-group textarea{
            width:100%;
            padding:.75rem;
            background:#1a1a1a;
            border:1px solid #333;
            color:#fff;
            border-radius:8px;
        }

        .submit-btn{
            background:#ff3366;
            color:#fff;
            border:none;
            padding:.75rem 2rem;
            border-radius:30px;
            cursor:pointer;
        }

        footer{
            text-align:center;
            padding:2rem;
            color:#666;
            border-top:1px solid #222;
        }

        @media(max-width:768px){

            .split-container,
            .about-split,
            .contact-split{
                flex-direction:column;
            }

            .services-grid{
                grid-template-columns:1fr;
            }

        }

    </style>
</head>

<body>

<header>

    <a href="#work" class="logo">

        <svg class="logo-icon" viewBox="0 0 100 100">

            <circle cx="50" cy="50" r="45" fill="none" stroke="#ff3366" stroke-width="3"/>

            <path d="M 30 40 L 50 60 L 70 40" fill="none" stroke="#ff3366" stroke-width="3"/>

        </svg>

        <span>Portfolio</span>

    </a>

    <nav class="desktop-nav">

        <ul>

            <li><a href="#work">Work</a></li>

            <li><a href="#about">About</a></li>

            <li><a href="#services">Services</a></li>

            <li><a href="#contact">Contact</a></li>

        </ul>

    </nav>

</header>

<div class="split-container" id="work">

    <div class="left-panel">

        @foreach($projects as $index => $project)

            <div class="image-container {{ $index === 0 ? 'active' : '' }}" data-project="{{ $index }}">

                <div
                    class="project-image"
                    style="background-image:url('{{ $project->thumbnail ? asset('storage/' . $project->thumbnail) : 'https://images.unsplash.com/photo-1558655146-9f40138edfeb?w=800&h=1000&fit=crop' }}')"
                ></div>

            </div>

        @endforeach

    </div>

    <div class="right-panel">

        @foreach($projects as $index => $project)

            <div class="project-details {{ $index === 0 ? 'active' : '' }}" data-project="{{ $index }}">

                <div class="project-number">

                    {{ str_pad($index + 1, 2, '0', STR_PAD_LEFT) }}

                </div>

                <h1 class="project-title">
                    {{ $project->title }}
                </h1>

                <span class="project-category">
                    {{ $project->category }}
                </span>

                <p class="project-description">
                    {{ $project->short_description }}
                </p>

                <div class="project-tags">

                    @foreach($project->tags ?? [] as $tag)

                        <span class="tag">
                            {{ $tag }}
                        </span>

                    @endforeach

                </div>

                <a
                    href="{{ route('project.show', $project->slug) }}"
                    class="view-project-btn"
                >
                    Lihat Detail Proyek →
                </a>

            </div>

        @endforeach

    </div>

</div>

<section id="about" class="about-section">

    <div class="about-split">

        <div class="about-content">

            <h2>Tentang Saya</h2>

            {!! $setting?->about !!}

        </div>

        <div class="about-image"></div>

    </div>

</section>

<section id="services" class="services-section">

    <div class="services-container">

        <div class="section-header">

            <h2>Layanan Saya</h2>

        </div>

        <div class="services-grid">

            @foreach($services as $service)

                <div class="service-card">

                    <div class="service-number">

                        {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}

                    </div>

                    <h3>
                        {{ $service->title }}
                    </h3>

                    <p>
                        {{ $service->description }}
                    </p>

                </div>

            @endforeach

        </div>

    </div>

</section>

<section id="contact" class="contact-section">

    <div class="contact-split">

        <div class="contact-info">

            <h2>Mari Bekerja Sama</h2>

            <div class="contact-details">

                <p>
                    {{ $setting?->email }}
                </p>

                <p>
                    {{ $setting?->location }}
                </p>

            </div>

            <div class="social-links">

                @foreach($socials as $social)

                    <a
                        href="{{ $social->url }}"
                        target="_blank"
                        class="social-link"
                    >
                        {{ $social->platform }}
                    </a>

                @endforeach

            </div>

        </div>

        <form class="contact-form" id="contactForm">

            @csrf

            <div class="form-group">

                <input type="text" name="name" placeholder="Name" required>

            </div>

            <div class="form-group">

                <input type="email" name="email" placeholder="Email" required>

            </div>

            <div class="form-group">

                <input type="text" name="subject" placeholder="Subject" required>

            </div>

            <div class="form-group">

                <textarea name="message" rows="5" placeholder="Message" required></textarea>

            </div>

            <button type="submit" class="submit-btn">
                Send Message
            </button>

        </form>

    </div>

</section>

<footer>

    <p>
        {{ $setting?->footer_text }}
    </p>

</footer>

<script>

    document.addEventListener('DOMContentLoaded', function(){

        const imageContainers = document.querySelectorAll('.image-container');

        const projectDetails = document.querySelectorAll('.project-details');

        const prevBtn = document.getElementById('prevBtn');

        const nextBtn = document.getElementById('nextBtn');

        let currentIndex = 0;

        const totalProjects = imageContainers.length;

        function showProject(index){

            imageContainers.forEach(el => el.classList.remove('active'));

            projectDetails.forEach(el => el.classList.remove('active'));

            imageContainers[index].classList.add('active');

            projectDetails[index].classList.add('active');

            currentIndex = index;
        }

        function nextProject(){

            let next = (currentIndex + 1) % totalProjects;

            showProject(next);
        }

        function prevProject(){

            let prev = (currentIndex - 1 + totalProjects) % totalProjects;

            showProject(prev);
        }

        if(nextBtn){
            nextBtn.addEventListener('click', nextProject);
        }

        if(prevBtn){
            prevBtn.addEventListener('click', prevProject);
        }

    });

    const contactForm = document.getElementById('contactForm');

    if(contactForm){

        contactForm.addEventListener('submit', async(e)=>{

            e.preventDefault();

            const formData = new FormData(e.target);

            const response = await fetch('{{ route("contact.send") }}',{

                method:'POST',

                headers:{
                    'X-CSRF-TOKEN':document.querySelector('meta[name="csrf-token"]').content
                },

                body:formData

            });

            const result = await response.json();

            alert(result.message);

            if(result.success){
                e.target.reset();
            }

        });

    }

</script>

</body>
</html>