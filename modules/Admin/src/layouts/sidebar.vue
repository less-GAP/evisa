<template>
  <div id="madeadminbar" class="nojq nojs">
    <div class="quicklinks" id="made-toolbar" role="navigation" aria-label="Toolbar">
      <!-- New style -->
      <div id="wrap-nav">
        <div class="relative p-4 top-nav 2xl:p-8">
          <div class="flex items-center justify-center">
            <div class="logo">
              <a href="https://po5.usa-server.com/admincp/" class="">
                <img id="logo-normal" class="w-[80px] lg:w-[120px] 2xl:w-[165px]" src="/src/img/logo.png" alt="Power of Five">
                <img id="logo-minimized" class="w-[60px] hidden" src="/src/img/logo-minimized.png" alt="Power of Five">
              </a>
            </div>
            <button id="minimize-menu" class="ml-auto cursor-pointer hamburger-icon w-[32px] md:w-[40px] 2xl:w-auto">
              <svg width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M25.6665 39.6665L44.3332 39.6665" stroke="#14082D" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M11.6665 28H44.3332" stroke="#14082D" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M25.6665 16.3335L44.3332 16.3335" stroke="#14082D" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg>
            </button>
            <button id="close-menu" class="rotate-180 2xl:rotate-0 2xl:absolute 2xl:top-1/2 2xl:-translate-y-1/2 2xl:-right-2 ml-auto cursor-pointer hamburger-icon w-[32px] md:w-[40px] 2xl:w-auto hidden">
              <svg width="56" height="56" viewBox="0 0 56 56" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M44.3335 14V42M37.3335 28H9.3335M37.3335 28L29.1668 19.8333M37.3335 28L29.1668 36.1667" stroke="#262F56" stroke-width="3" stroke-linecap="round" stroke-linejoin="round"></path>
              </svg>
            </button>
          </div>
        </div>
        <div class="p-4 main-nav 2xl:py-6 2xl:px-8">
          <ul id="side_menu" class="p-0 m-0 text-center list-none">
            <li class="menu-item block mb-2 lg:mb-3 relative ">
              <a href="/admincp" class="flex items-center px-4 py-2 text-left rounded-lg 2xl:rounded-2xl lg:p-4">
                            <span class="icon inline-block w-8 h-8 text-center">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g mask="url(#mask0_1401_402)">
                        <path d="M13.6702 7.8457L14.0414 13.3656L14.2257 16.14C14.2277 16.4254 14.2723 16.7088 14.3586 16.9812C14.5811 17.51 15.1166 17.846 15.6991 17.8226L24.5754 17.2419C24.9598 17.2356 25.331 17.3794 25.6073 17.6416C25.8375 17.8602 25.9862 18.146 26.0331 18.4535L26.0489 18.6402C25.6815 23.7264 21.9459 27.9688 16.8702 29.0639C11.7944 30.159 6.58947 27.8456 4.08127 23.3798C3.35818 22.0823 2.90652 20.6563 2.75283 19.1852C2.68863 18.7498 2.66036 18.3099 2.6683 17.8699C2.66036 12.4169 6.54362 7.70253 11.9794 6.56601C12.6337 6.46413 13.275 6.81048 13.5374 7.40729C13.6053 7.5455 13.6501 7.69353 13.6702 7.8457Z" fill="currentColor"></path>
                        <path opacity="0.4" d="M29.3337 13.0829L29.3244 13.1263L29.2975 13.1895L29.3012 13.363C29.2873 13.5928 29.1985 13.8138 29.0457 13.9925C28.8864 14.1785 28.6688 14.3052 28.4292 14.3544L28.2831 14.3744L18.042 15.038C17.7013 15.0716 17.3621 14.9617 17.1089 14.7358C16.8977 14.5474 16.7628 14.2933 16.7247 14.0194L16.0373 3.79325C16.0253 3.75868 16.0253 3.7212 16.0373 3.68661C16.0467 3.40473 16.1708 3.13829 16.3819 2.94681C16.5928 2.75533 16.8733 2.65477 17.1604 2.6676C23.2403 2.82228 28.3501 7.19422 29.3337 13.0829Z" fill="currentColor"></path>
                    </g>
                </svg>                            </span>
                <span class="pl-4 font-bold txt lg:pl-6 lg:text-lg">Dashboard</span>
              </a>
            </li>
            <li class="menu-item block mb-2 lg:mb-3 relative ">
              <a href="/admincp/admin.php?page=product" class="flex items-center px-4 py-2 text-left rounded-lg 2xl:rounded-2xl lg:p-4">
                            <span class="icon inline-block w-8 h-8 text-center">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M22.5667 8.00016V8.10016H22.6667H25.3333C26.7448 8.10016 27.9 9.25539 27.9 10.6668V26.6668C27.9 28.0783 26.7448 29.2335 25.3333 29.2335H6.66667C5.25523 29.2335 4.1 28.0783 4.1 26.6668V10.6668C4.1 9.25539 5.25523 8.10016 6.66667 8.10016H9.33333H9.43333V8.00016C9.43333 4.32206 12.3219 1.4335 16 1.4335C19.6781 1.4335 22.5667 4.32206 22.5667 8.00016ZM20 8.10016H20.1V8.00016C20.1 5.67827 18.3219 3.90016 16 3.90016C13.6781 3.90016 11.9 5.67827 11.9 8.00016V8.10016H12H20ZM25.3333 26.7668H25.4333V26.6668V10.6668V10.5668H25.3333H6.66667H6.56667V10.6668V26.6668V26.7668H6.66667H25.3333ZM22.566 12.1002C22.5141 15.7305 19.6447 18.5668 16 18.5668C12.3553 18.5668 9.48586 15.7305 9.43405 12.1002H11.9011C11.9513 14.3729 13.7116 16.1002 16 16.1002C18.2884 16.1002 20.0487 14.3729 20.0989 12.1002H22.566Z" fill="currentColor"></path>
                </svg>                            </span>
                <span class="pl-4 font-bold txt lg:pl-6 lg:text-lg">Products</span>
              </a>
              <span class="toggle-menu absolute right-4 top-3 lg:top-5 cursor-pointer flex items-center justify-center w-6 h-6"><i class="fa fa-angle-down"></i></span>
              <ul class="list-none menu-child px-4">
                <li class="menu-item block  mt-3">
                  <a href="/admincp/admin.php?page=product" class="flex items-center px-3 py-2 text-left rounded-lg overflow-hidden relative ">
                    <span class="txt text-[#757575] text-sm pl-5">List Product</span>
                  </a>
                </li>
                <li class="menu-item block  mt-3">
                  <a href="/admincp/admin.php?page=product_add" class="flex items-center px-3 py-2 text-left rounded-lg overflow-hidden relative ">
                    <span class="txt text-[#757575] text-sm pl-5">Add Product</span>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item block mb-2 lg:mb-3 relative ">
              <a href="/admincp/admin.php?page=series" class="flex items-center px-4 py-2 text-left rounded-lg 2xl:rounded-2xl lg:p-4">
                            <span class="icon inline-block w-8 h-8 text-center">
                                <svg width="32" height="32" viewBox="0 0 32 32" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M20.6667 13L27.7488 9.58541C28.7831 9.08673 30 9.81198 30 10.9271V21.0729C30 22.188 28.7831 22.9133 27.7488 22.4146L20.6667 19M5.11111 25H17.5556C19.2738 25 20.6667 23.6569 20.6667 22V10C20.6667 8.34315 19.2738 7 17.5556 7H5.11111C3.39289 7 2 8.34315 2 10V22C2 23.6569 3.39289 25 5.11111 25Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>                            </span>
                <span class="pl-4 font-bold txt lg:pl-6 lg:text-lg">Series Video</span>
              </a>
              <span class="toggle-menu absolute right-4 top-3 lg:top-5 cursor-pointer flex items-center justify-center w-6 h-6"><i class="fa fa-angle-down"></i></span>
              <ul class="list-none menu-child px-4">
                <li class="menu-item block  mt-3">
                  <a href="/admincp/admin.php?page=series" class="flex items-center px-3 py-2 text-left rounded-lg overflow-hidden relative ">
                    <span class="txt text-[#757575] text-sm pl-5">List Series</span>
                  </a>
                </li>
                <li class="menu-item block  mt-3">
                  <a href="/admincp/admin.php?page=series_add" class="flex items-center px-3 py-2 text-left rounded-lg overflow-hidden relative ">
                    <span class="txt text-[#757575] text-sm pl-5">Add Series</span>
                  </a>
                </li>
                <li class="menu-item block  mt-3">
                  <a href="/admincp/admin.php?page=videos" class="flex items-center px-3 py-2 text-left rounded-lg overflow-hidden relative ">
                    <span class="txt text-[#757575] text-sm pl-5">List Video</span>
                  </a>
                </li>
                <li class="menu-item block  mt-3">
                  <a href="/admincp/admin.php?page=video_add" class="flex items-center px-3 py-2 text-left rounded-lg overflow-hidden relative ">
                    <span class="txt text-[#757575] text-sm pl-5">Add Video</span>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item block mb-2 lg:mb-3 relative ">
              <a href="/admincp/users.php" class="flex items-center px-4 py-2 text-left rounded-lg 2xl:rounded-2xl lg:p-4">
                            <span class="icon inline-block w-8 h-8 text-center">
                                <svg width="32" height="33" viewBox="0 0 32 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M16.2134 14.8501C16.0801 14.8368 15.9201 14.8368 15.7734 14.8501C12.6001 14.7434 10.0801 12.1434 10.0801 8.94344C10.0801 5.67677 12.7201 3.02344 16.0001 3.02344C19.2667 3.02344 21.9201 5.67677 21.9201 8.94344C21.9067 12.1434 19.3867 14.7434 16.2134 14.8501Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M9.54646 19.7704C6.3198 21.9304 6.3198 25.4504 9.54646 27.5971C13.2131 30.0504 19.2265 30.0504 22.8931 27.5971C26.1198 25.4371 26.1198 21.9171 22.8931 19.7704C19.2398 17.3304 13.2265 17.3304 9.54646 19.7704Z" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                </svg>                            </span>
                <span class="pl-4 font-bold txt lg:pl-6 lg:text-lg">User</span>
              </a>
              <span class="toggle-menu absolute right-4 top-3 lg:top-5 cursor-pointer flex items-center justify-center w-6 h-6"><i class="fa fa-angle-down"></i></span>
              <ul class="list-none menu-child px-4">
                <li class="menu-item block  mt-3">
                  <a href="/admincp/users.php" class="flex items-center px-3 py-2 text-left rounded-lg overflow-hidden relative ">
                    <span class="txt text-[#757575] text-sm pl-5">List User</span>
                  </a>
                </li>
                <li class="menu-item block  mt-3">
                  <a href="/admincp/profile.php" class="flex items-center px-3 py-2 text-left rounded-lg overflow-hidden relative ">
                    <span class="txt text-[#757575] text-sm pl-5">Profile</span>
                  </a>
                </li>
                <li class="menu-item block  mt-3">
                  <a href="/admincp/user-new.php" class="flex items-center px-3 py-2 text-left rounded-lg overflow-hidden relative ">
                    <span class="txt text-[#757575] text-sm pl-5">Add User</span>
                  </a>
                </li>
              </ul>
            </li>
            <li class="menu-item block mb-2 lg:mb-3 relative active toggled">
              <a href="/admincp/admin.php?page=setting" class="flex items-center px-4 py-2 text-left rounded-lg 2xl:rounded-2xl lg:p-4">
                            <span class="icon inline-block w-8 h-8 text-center">
                                <svg width="32" height="33" viewBox="0 0 32 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M12.3714 25.5691L12.3553 25.4538L12.2471 25.4109C11.4292 25.0863 10.7254 24.644 10.042 24.1182L9.95109 24.0483L9.84484 24.0914L6.52853 25.4366C6.31774 25.5116 6.06898 25.43 5.96227 25.2343L5.96232 25.2343L5.95984 25.23L3.29317 20.6167L3.29319 20.6167L3.29197 20.6146C3.23519 20.519 3.21518 20.4061 3.23567 20.2968C3.25615 20.1875 3.31574 20.0895 3.40329 20.0209L3.40368 20.0206L6.21702 17.8073L6.30048 17.7416L6.29283 17.6357L6.20052 16.3566L6.29286 15.0374L6.30034 14.9306L6.21562 14.8652L3.40329 12.6926C3.40314 12.6925 3.40299 12.6924 3.40284 12.6923C3.31554 12.6238 3.25612 12.5258 3.23567 12.4168C3.21518 12.3075 3.23519 12.1945 3.29197 12.0989L3.29198 12.0989L3.29317 12.0969L5.95984 7.48353L5.95989 7.48356L5.96227 7.47921C6.07299 7.27622 6.3243 7.1934 6.52429 7.27522L6.52548 7.2757L9.84548 8.60903L9.94995 8.65099L10.04 8.58344C10.7247 8.06989 11.429 7.62731 12.2471 7.30267L12.3553 7.25973L12.3714 7.14443L12.8644 3.61396C12.9025 3.39198 13.0982 3.22344 13.3334 3.22344H18.6667C18.9018 3.22344 19.0975 3.39198 19.1357 3.61396L19.6286 7.14443L19.6447 7.25973L19.7529 7.30267C20.571 7.62731 21.2753 8.06989 21.96 8.58344L22.0501 8.65099L22.1546 8.60903L25.4746 7.2757L25.4757 7.27521C25.6757 7.1934 25.927 7.27622 26.0378 7.47921L26.0377 7.47924L26.0402 7.48353L28.7069 12.0969L28.7078 12.0985C28.8281 12.3021 28.7741 12.5521 28.5968 12.6925C28.5966 12.6927 28.5963 12.6929 28.5961 12.6931L25.7844 14.8652L25.6997 14.9306L25.7072 15.0374L25.7995 16.3568L25.7072 17.6761L25.6997 17.7829L25.7844 17.8484L28.5961 20.0204C28.5963 20.0206 28.5966 20.0208 28.5968 20.021C28.7741 20.1615 28.8281 20.4114 28.7078 20.615L28.7069 20.6167L26.0402 25.23L26.0401 25.23L26.0378 25.2343C25.927 25.4373 25.6757 25.5201 25.4757 25.4383L25.4746 25.4378L22.1546 24.1045L22.0501 24.0626L21.96 24.1301C21.2753 24.6437 20.571 25.0862 19.7529 25.4109L19.6447 25.4538L19.6286 25.5691L19.1357 29.0996C19.0975 29.3216 18.9018 29.4901 18.6667 29.4901H13.3334C13.0982 29.4901 12.9025 29.3216 12.8644 29.0996L12.3714 25.5691ZM15 5.4901H14.8264L14.802 5.66203L14.3282 9.00435C12.7908 9.35482 11.4285 10.1741 10.4127 11.3023L7.3326 9.97314L7.1691 9.90259L7.08012 10.0568L6.08012 11.7902L5.99063 11.9453L6.13495 12.0513L8.83104 14.0318C8.34522 15.5437 8.34524 17.17 8.83107 18.6818L6.12148 20.6757L5.97737 20.7817L6.06678 20.9367L7.06678 22.67L7.1555 22.8238L7.31871 22.754L10.4265 21.4239C11.4403 22.5387 12.7894 23.3577 14.3149 23.6967L14.7886 27.0514L14.8129 27.2234H14.9867H17.0134H17.187L17.2114 27.0515L17.6852 23.7089C19.2102 23.3582 20.5594 22.5391 21.5735 21.4239L24.6813 22.754L24.8445 22.8238L24.9333 22.67L25.9333 20.9367L26.0229 20.7813L25.8781 20.6753L23.169 18.6946C23.6548 17.1785 23.6548 15.548 23.1689 14.0319L25.8651 12.0513L26.0094 11.9453L25.9199 11.7902L24.9199 10.0568L24.8309 9.90259L24.6674 9.97314L21.5874 11.3023C20.5524 10.151 19.1833 9.35184 17.6718 9.01679L17.1981 5.66214L17.1738 5.4901H17H15ZM16 11.2234C17.3615 11.2234 18.6671 11.7643 19.6298 12.727C20.5925 13.6896 21.1334 14.9953 21.1334 16.3568C21.1334 17.7182 20.5925 19.0239 19.6298 19.9866C18.6671 20.9493 17.3615 21.4901 16 21.4901C14.6386 21.4901 13.3329 20.9493 12.3702 19.9866C11.4075 19.0239 10.8667 17.7182 10.8667 16.3568C10.8667 14.9953 11.4075 13.6896 12.3702 12.727C13.3329 11.7643 14.6386 11.2234 16 11.2234ZM16 13.4901C15.2397 13.4901 14.5106 13.7921 13.973 14.3297C13.4354 14.8673 13.1334 15.5965 13.1334 16.3568C13.1334 17.1171 13.4354 17.8462 13.973 18.3838C14.5106 18.9214 15.2397 19.2234 16 19.2234C16.7603 19.2234 17.4895 18.9214 18.0271 18.3838C18.5647 17.8462 18.8667 17.1171 18.8667 16.3568C18.8667 15.5965 18.5647 14.8673 18.0271 14.3297C17.4895 13.7921 16.7603 13.4901 16 13.4901Z" fill="currentColor"></path>
                </svg>                            </span>
                <span class="pl-4 font-bold txt lg:pl-6 lg:text-lg">Settings</span>
              </a>
            </li>
            <li class="menu-item block  relative ">
              <a href="https://po5.usa-server.com/login.php?action=logout&amp;_uninonce=5f9a05aa31" class="flex items-center px-4 py-2 text-left rounded-lg 2xl:rounded-2xl lg:p-4">
                            <span class="icon inline-block w-8 h-8 text-center">
                                <svg width="32" height="33" viewBox="0 0 32 33" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M26.1871 17.1026L26.1871 17.1026L26.1856 17.1043L21.6233 22.4276C21.2159 22.9029 20.5005 22.958 20.0252 22.5507C19.5499 22.1433 19.4949 21.4279 19.9022 20.9526L22.5869 17.8201L22.8698 17.49L22.435 17.49L12.1087 17.49C11.4828 17.49 10.9754 16.9825 10.9754 16.3566C10.9754 15.7307 11.4828 15.2233 12.1087 15.2233L22.4349 15.2233L22.8697 15.2233L22.5867 14.8931L19.9022 11.7608C19.4949 11.2856 19.5499 10.5701 20.0252 10.1628C20.5005 9.75545 21.2159 9.81052 21.6233 10.2858L26.1856 15.6092L26.1856 15.6092L26.1871 15.6108C26.2445 15.6764 26.2932 15.7472 26.3331 15.8217L26.3332 15.8219C26.4228 15.989 26.4671 16.173 26.467 16.3566C26.4669 16.6252 26.372 16.8917 26.1871 17.1026ZM14.867 9.68994C14.867 8.8431 14.1805 8.15661 13.3337 8.15661L9.33366 8.15661C8.48682 8.15661 7.80032 8.8431 7.80032 9.68994L7.80032 23.0233C7.80032 23.8701 8.48682 24.5566 9.33366 24.5566L13.3337 24.5566C14.1805 24.5566 14.867 23.8701 14.867 23.0233L14.867 21.0233C14.867 20.3974 15.3744 19.8899 16.0003 19.8899C16.6262 19.8899 17.1337 20.3974 17.1337 21.0233L17.1337 23.0233C17.1337 25.122 15.4323 26.8233 13.3337 26.8233L9.33366 26.8233C7.23497 26.8233 5.53366 25.122 5.53366 23.0233L5.53366 9.68994C5.53366 7.59126 7.23498 5.88994 9.33366 5.88994L13.3337 5.88994C15.4323 5.88994 17.1337 7.59126 17.1337 9.68994L17.1337 11.6899C17.1337 12.3159 16.6262 12.8233 16.0003 12.8233C15.3744 12.8233 14.867 12.3159 14.867 11.6899L14.867 9.68994Z" fill="currentColor"></path>
                </svg>                            </span>
                <span class="pl-4 font-bold txt lg:pl-6 lg:text-lg">Sign Out</span>
              </a>
            </li>
          </ul>
        </div>
      </div>
      <!-- New style -->
    </div>
    <a class="screen-reader-shortcut" href="https://po5.usa-server.com/login.php?action=logout&amp;_uninonce=5f9a05aa31">Log Out</a>
  </div>
</template>
