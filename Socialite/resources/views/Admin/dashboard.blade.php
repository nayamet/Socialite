<!DOCTYPE html>
<html lang="en">
<head>
   <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        
        <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@200;400&display=swap" rel="stylesheet">
                
        <script src="https://kit.fontawesome.com/38b09dcc3b.js" crossorigin="anonymous"></script>

        <style>
           html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}}
        </style>

        <style>
            body {
                font-family: 'Titillium Web', sans-serif;
                background-color: #f5f5f5;
            }
        </style>
</head>
<body>
    

<div class="row vh-100">
        <!-- Sidebar -->
        <div class="flex-shrink-0 vh-100 bg-light shadow-sm" style="width: 280px;">
            <ul class="list-unstyled ps-0 ms-4">
                <li class="mb-1">
                    <a class="btn align-items-center rounded text-black" href="{{route('admin.dashboard')}}">
                        <i class="fas fa-tachometer-alt"></i> &nbsp;
                        Dashboard   
                    </a>
                </li>
                <li class="mb-1">
                    <button class="btn btn-toggle align-items-center rounded collapsed text-black" data-bs-toggle="collapse" data-bs-target="#dashboard-collapse" aria-expanded="false">
                        <a href="{{route('admin.users')}}"><i class="fas fa-users"></i>  Users&nbsp;</a>
                        
                   
                    </button>
                    <div class="collapse ms-5" id="dashboard-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
                            <li><a href="" class="link-dark rounded text-black">Add new</a></li>
                            <li><a href="" class="link-dark rounded text-black">List</a></li>
                        </ul>
                    </div>
                </li>
                <li class="mb-1">
                    <button class="btn btn-toggle align-items-center rounded collapsed text-black " data-bs-toggle="collapse" data-bs-target="#orders-collapse" aria-expanded="false">
                        <a href="{{route('admin.posts')}}"><i class="fas fa-boxes"></i> &nbsp;</a>
                        
                    Posts
                    </button>
                    <div class="collapse ms-5" id="orders-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
                            <li><a href="#" class="link-dark rounded text-black"> - View</a></li>
                            <li><a href="#" class="link-dark rounded text-black"> - Edit</a></li>
                            <li><a href="#" class="link-dark rounded text-black"> - Delete</a></li>
                        </ul>
                    </div>
                </li>
                <li class="mb-1">
                    <button class="btn align-items-center rounded text-black">
                        <a href="{{route('admin.comments')}}"><i class="fas fa-search"></i> &nbsp;</a>
                        Comments
                    </button>
                </li>
                <li class="border-top my-3"></li>
                <li class="mb-1">
                    <button class="btn btn-toggle align-items-center rounded collapsed text-black " data-bs-toggle="collapse" data-bs-target="#account-collapse" aria-expanded="false">
                        <a href="{{route('home')}}"><i class="fas fa-user-alt"></i> Account&nbsp;</a>
                    </button>
                    <div class="collapse ms-5" id="account-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
                            <li><a href="#" class="link-dark rounded text-black">New...</a></li>
                            <li><a href="#" class="link-dark rounded text-black">Profile</a></li>
                            <li><a href="#" class="link-dark rounded text-black">Settings</a></li>
                            <li><a href="#" class="link-dark rounded text-black">Sign out</a></li>
                        </ul>
                    </div>
                </li>
            </ul>
        </div>


        <!-- navbar -->
        <div class="col" style="margin-right:-15px;">  
            <div>
                <div class="row">
                    <nav class="navbar navbar-dark bg-success">
                        <div class="container-fluid">
                            <h6 class="navbar-brand my-auto">Admin Dashboard</h6>
                            <form class="d-flex">
                                <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                                <button class="btn btn-success bg-danger" type="submit">Search</button>
                            </form>
                            <div class="logout">
                                <a href="{{route('logout')}}"><img src="https://img.icons8.com/cute-clipart/50/000000/exit.png"/></a>
                            </div>
                        </div>
                    </nav>
                </div>
            </div>
            

            <!-- Dashboard -->
            <div class="row container">
                <div>
                    <h3 class="p-2 border-primary border-bottom border-primary pb-4">Home</h3>
                    
                    <div class="row mx-auto pt-4">
                            <div class="card col-4 m-2" style="width:23rem; height:9rem">
                                <div class="card-body d-flex">
                                    <div class="my-auto">
                                        <h1 class="fw-bold">{{$info->totalUsers}}</h1>
                                        <h6>Total Users</h6>
                                    </div>
                                    <p class="ms-auto my-auto">
                                        <i class="display-2 text-muted fas fa-users"></i>
                                    </p>
                                </div>
                            </div>
                            <div class="card col-4 m-2" style="width:23rem; height:9rem">
                                <div class="card-body d-flex">
                                    <div class="my-auto">
                                        <h1 class="fw-bold">{{$info->totalPosts}}</h1>
                                        <h6>Total Posts</h6>
                                    </div>
                                    <p class="ms-auto my-auto">
                                        <i class="display-2 text-muted fas fa-boxes"></i>
                                    </p>
                                </div>
                            </div>
                            <div class="card col-4 m-2" style="width:23rem; height:9rem">
                                <div class="card-body d-flex">
                                    <div class="my-auto">
                                        <h1 class="fw-bold">{{$info->totalLikes}}</h1>
                                        <h6>Total Likes</h6>
                                    </div>
                                    <p class="ms-auto my-auto">
                                        <i class="display-2 text-muted fas fa-boxes"></i>
                                    </p>
                                </div>
                            </div>
                            <div class="card col-4 m-2" style="width:23rem; height:9rem">
                                <div class="card-body d-flex">
                                    <div class="my-auto">
                                        <h1 class="fw-bold">{{$info->totalComments}}</h1>
                                        <h6>Total Comments</h6>
                                    </div>
                                    <p class="ms-auto my-auto">
                                        <i class="display-2 text-muted fas fa-boxes"></i>
                                    </p>
                                </div>
                            </div>
                    </div>
                </div>
                </div>

            </div>
        </div>
</div>
</body>
</html>