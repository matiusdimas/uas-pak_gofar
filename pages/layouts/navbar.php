<?php
$current_page = basename($_SERVER['PHP_SELF']);
function activePage($page)
{
    global $current_page;
    return ($current_page == $page) ? 'text-lg bg-blue-950 text-white md:border-b-4 md:border-[#EA5455] font-semibold px-2 py-1 block 2xl:text-6xl md:bg-transparent md:text-blue-950' : 'text-lg 2xl:text-6xl hover:bg-[#E4DCCF] hover:text-slate-900 md:hover:border-b-4 md:hover:border-[#E4DCCF] md:hover:text-blue-950 px-2 py-1 block transition-all active:scale-95 active:opacity-80 md:hover:bg-inherit text-blue-950 font-semibold md:border-b-4 md:border-transparent';
}
?>
<div class="bg-transparent fixed top-0 z-[500] w-full  flex md:justify-center">
    <nav class="bg-white/50 backdrop-blur-lg w-full  flex px-4 py-2 md:justify-evenly md:gap-5">
        <a href="./index.php">
            <div class="flex items-center gap-2 ">
                <img class="w-10" src="../img/PERUMAHAN__1_-removebg-preview.png" alt="icon">
                <h1 class="font-bold text-xl text-blue-950">Perumahan</h1>
            </div>
        </a>
        <div id="hamburger" class="flex flex-col mt-3 gap-1 cursor-pointer md:hidden absolute right-0 mr-12 ">
            <span class="w-6 h-[3px] bg-black transition duration-300 ease-in-out origin-top-left "></span>
            <span class="w-6 h-[3px] bg-black transition duration-300 ease-in-out"></span>
            <span class="w-6 h-[3px] bg-black transition duration-300 ease-in-out origin-bottom-left"></span>
        </div>
        <div id="list-nav" class="navnull absolute z-[500] left-0 mt-12 md:-ml-10 md:mt-0 w-full md:w-auto  bg-white text-center md:static md:flex md:opacity-100 md:bg-transparent md:backdrop-blur-none md:visible md:shadow-none md:border-b-0">
            <ul class="md:gap-x-10 md:flex md:items-center">
                <li>
                    <a href="./index.php" class="<?php echo activePage('index.php'); ?>">
                        Home
                    </a>
                </li>
                <li>
                    <a href="./recommend.php" class="<?php echo activePage('recommend.php'); ?>">
                        Lihat Rumah
                    </a>
                </li>
                <?php
                if (isset($_SESSION['username'])) { ?>
                    <li>
                        <a href="./settings.php" class="<?php echo activePage('login.php'); ?>  md:hidden">
                            Profile
                        </a>
                    </li>
                    <li>
                        <a href="./logout.php" class="<?php echo activePage('login.php'); ?>  md:hidden">
                            Logout
                        </a>
                    </li>
                <?php } else { ?>
                    <li>
                        <a href="./login.php" class="<?php echo activePage('login.php'); ?>  md:hidden">
                            Login/Register
                        </a>
                    </li>
                <?php }
                ?>
            </ul>
        </div>

        <?php
        if (isset($_SESSION['username'])) { ?>
            <div>
                <div class="flex items-center gap-4 mt-1">
                    <div class="w-8">
                        <a href="./favorit.php" class="hover:bg-slate-500 rounded-full duration-200">
                            <img class="cursor-pointer" src="../img/heart.png" alt="cart">
                        </a>
                    </div>
                    <div id="profileDrop" class="hidden md:flex md:gap-3 text-white px-3 py-1 bg-blue-950 rounded-md duration-200 hover:opacity-80 active:opacity-100 active:scale-105 cursor-pointer">Profile <span class="block font-semibold -mt-[1px]">v</span>
                    </div>
                </div>
                <div id="profileDropList" class="hidden border-x-2 border-b-2 absolute z-50 bg-white rounded-b-md py-1 ml-12">
                    <ul class="grid justify-center">
                        <li><a href="./settings.php" class="px-4 py-1 hover:bg-slate-200 duration-200 active:opacity-80">Settings</a></li>
                        <li><a href="./logout.php" class="px-5 py-1 rounded-b-md hover:bg-slate-200 duration-200 active:opacity-80">Logout</a></li>
                    </ul>
                </div>
            </div>
        <?php } else { ?>
            <div class="flex items-center">
                <a href="./login.php" class="hidden md:block text-white px-3 py-1 bg-blue-950 rounded-md duration-200 hover:opacity-80 active:opacity-100 active:scale-105 ">Login</a>
            </div>
        <?php }
        ?>
    </nav>
</div>