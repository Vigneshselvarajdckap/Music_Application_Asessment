<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

    <title>Music</title>
</head>

<body>
    
    <div class="min-h-full">
        <nav class="bg-green-800">
            <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">
                <div class="flex h-16 items-center justify-between">
                    <div class="flex items-center">


                        <div class="hidden md:block">
                            <div class="ml-10 flex items-baseline space-x-4">
<!--                                homepage form-->
                                <a href="/"
                                    class="<?=url('/')?'bg-gray-900 text-white':'text-gray-300'?> rounded-md px-3 py-2 text-sm font-medium"
                                    aria-current="page">HomePage</a>

<!--                                /** adding music form*/-->
                                <?php if (isset($_SESSION['admin'])) :?>
                                <form action="/addmusic" method="post" enctype="multipart/form-data">
                                    <button type="submit"
                                       class="<?=url('/addmusic')?'bg-green-900 text-white':'text-gray-300'?> hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Add Music</button>
                                </form>

                                    <!--  /** adding artist form*/-->
                                <form action="/addartist" method="post" enctype="multipart/form-data">
                                    <button type="submit"
                                            class="<?=url('/addartist')?'bg-green-900 text-white':'text-gray-300'?> hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Add artist</button>
                                </form>

                                <?php endif; ?>
                                <?php if (isset($_SESSION['user'])) :?>
                                <form action="/addplaylist" method="post">
                                    <button type="submit"
                                            class="<?=url('/addplaylist')?'bg-gray-900 text-white':'text-gray-300'?> hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Create Playlist</button>
                                </form>
                                    <form action="/requestpremium" method="post">
                                        <button type="submit"
                                                class="<?=url('/requestpremium')?'bg-gray-900 text-white':'text-gray-300'?> hover:bg-gray-700 hover:text-white rounded-md px-3 py-2 text-sm font-medium">Request Premium</button>
                                    </form>
                                <?php endif;?>


                            </div>
                        </div>
                    </div>


                    <div class="hidden md:block">
                        <div class="ml-4 flex items-center md:ml-6">

                            <?php if (isset($_SESSION['admin'])) :?>
                                <form action="/logout" method="post" enctype="multipart/form-data">
                                    <button type="submit"
                                            class="bg-red-500 hover:bg-blue-700 text-whitefont-bold py-2 px-4 rounded">
                                        Log out</button>
                                </form>
                            <?php elseif(isset($_SESSION['user'])):?>
                                <form action="/logout" method="post" enctype="multipart/form-data">
                                    <button type="submit"
                                            class="bg-blue-500 hover:bg-blue-700 text-whitefont-bold py-2 px-4 rounded">
                                        Log out</button>
                                </form>
                            <?php else : ?>
                                <div class="relative ml-3">
                                <div>
                                    <form action="/login" method="post" enctype="multipart/form-data">
                                        <button type="submit"
                                            class="bg-blue-500 hover:bg-blue-700 text-whitefont-bold py-2 px-4 rounded">
                                            Log in</button>
                                    </form>

                                </div>

                            </div>
                            <?php endif; ?>

                        </div>

                    </div>

                </div>
        </nav>
        <main>
        <header class="bg-white shadow">
                        <div class="mx-auto max-w-7xl px-4 py-6 sm:px-6 lg:px-8">
                            <h1 class="text-3xl font-bold tracking-tight text-gray-900">
                            </h1>

                        </div>
            <div>
                <form action="/musiclist" method="post">
                   <button style="margin-top: 10px; margin-left: 10px;" class="<?=url('/musiclist')?'bg-green-500 text-white':'bg-green-900 text-white '?> rounded-md px-3 py-2 text-sm font-medium"
                    aria-current="page">All Music</button>
                </form>
                <form action="/artistlist" method="post" >
                    <button style="margin-top: 10px; margin-left: 10px;" class="<?=url('/artistlist')?'bg-green-500 text-white':'bg-green-900 text-white '?> rounded-md px-3 py-2 text-sm font-medium"
                            aria-current="page">All Artist</button>
                </form>
                </form>
            </div>
        </header>
            <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">

                <?php if (isset($_SESSION['admin'])) :?>
                    <h2>good morning <?php echo $_SESSION['admin']?> ..</h2>
                <?php endif; ?>
                <?php if (isset($_SESSION['user'])) :?>
                    <h2>good morning user<?php echo $_SESSION['user']?> ..</h2>
                <?php endif; ?>

                <!-- show songs button -->
                <?php foreach ($album as $albumname): ?>
                    <form action="/albumdescription" method="post">
                        <button style="margin-top: 10px; name="projectId" class="text-green-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800" type ="submit" value="<?php echo $albumname->id?>"><?php echo "Song Name :"." ".$albumname->music_name?></button>
                    </form>
                <?php endforeach; ?>
    
                <!-- show artist button -->
                <?php foreach ($artist as $artistname): ?>
                    <form action="/artistdescription" method="post">
                        <button style="margin-top: 10px; name="projectId" class="text-green-700 hover:text-white border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center mr-2 mb-2 dark:border-blue-500 dark:text-blue-500 dark:hover:text-white dark:hover:bg-blue-500 dark:focus:ring-blue-800" type ="submit" value="<?php echo $artistname->id?>"><?php echo "Artist Name :"." ".$artistname->artist_name?></button>
                    </form>
                <?php endforeach; ?>
            </div>
        </main>
    </div>
</body>
</html>
