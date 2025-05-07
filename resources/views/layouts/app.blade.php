<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concerta- @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
</head>
<body class="font-poppins">
    <div id="navbar" class="transition-all duration-300">
        @include('components.navbar')
    </div>

    @include('components.sidebar')

    <div id="main-content" class="container mx-auto mt-4 px-4 transition-transform duration-300">
        @yield('content')
    </div>

    <div id="footer" class="transition-all duration-300">
        <x-footer />
    </div>

    <script>
        const burgerMenu = document.getElementById('burger-menu');
        const sidebar = document.getElementById('sidebar');
        const closeSidebar = document.getElementById('close-sidebar');
        const mainContent = document.getElementById('main-content');  
        const navbar = document.getElementById('navbar');  
        const footer = document.getElementById('footer');  

        burgerMenu.addEventListener('click', () => {
            sidebar.classList.remove('-translate-x-full');
            sidebar.classList.add('translate-x-0');
            mainContent.classList.add('ml-64');  
            navbar.classList.add('ml-64');      
            footer.classList.add('ml-64');     
        });

        closeSidebar.addEventListener('click', () => {
            sidebar.classList.remove('translate-x-0');
            sidebar.classList.add('-translate-x-full');
            mainContent.classList.remove('ml-64'); 
            navbar.classList.remove('ml-64');     
            footer.classList.remove('ml-64');    
        });
    </script>
    
</body>
</html>
