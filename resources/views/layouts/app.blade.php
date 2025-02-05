<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    {{-- <link rel="preconnect" href="https://fonts.bunny.net"> --}}
    {{-- <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" /> --}}

    <!-- Scripts -->
    @vite(['resources/scss/app.scss', 'resources/js/app.js'])

    <!-- Styles -->
    @livewireStyles
</head>

<body>
    <div id="container">
        <div id="nav-bar">

            <div class="nav-section">
                <div>
                    <svg class="logo" width="277" height="47" viewBox="0 0 277 47" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M70.4318 17.1818C70.2614 15.7424 69.5701 14.625 68.358 13.8295C67.1458 13.0341 65.6591 12.6364 63.8977 12.6364C62.6098 12.6364 61.483 12.8447 60.517 13.2614C59.5606 13.678 58.8125 14.2509 58.2727 14.9801C57.7424 15.7093 57.4773 16.5379 57.4773 17.4659C57.4773 18.2424 57.6619 18.91 58.0312 19.4688C58.41 20.018 58.893 20.4773 59.4801 20.8466C60.0672 21.2064 60.6828 21.5047 61.3267 21.7415C61.9706 21.9687 62.5625 22.1534 63.1023 22.2955L66.0568 23.0909C66.8144 23.2898 67.6572 23.5644 68.5852 23.9148C69.5227 24.2652 70.4176 24.7434 71.2699 25.3494C72.1316 25.946 72.8419 26.7131 73.4006 27.6506C73.9593 28.5881 74.2386 29.7386 74.2386 31.1023C74.2386 32.6742 73.8267 34.0947 73.0028 35.3636C72.1884 36.6326 70.9953 37.6411 69.4233 38.3892C67.8608 39.1373 65.9621 39.5114 63.7273 39.5114C61.6439 39.5114 59.84 39.1752 58.3153 38.5028C56.8002 37.8305 55.607 36.893 54.7358 35.6903C53.8741 34.4877 53.3864 33.0909 53.2727 31.5H56.9091C57.0038 32.5985 57.3731 33.5076 58.017 34.2273C58.6705 34.9375 59.4943 35.4678 60.4886 35.8182C61.4924 36.1591 62.572 36.3295 63.7273 36.3295C65.072 36.3295 66.2794 36.1117 67.3494 35.6761C68.4195 35.2311 69.267 34.6155 69.892 33.8295C70.517 33.0341 70.8295 32.1061 70.8295 31.0455C70.8295 30.0795 70.5597 29.2936 70.0199 28.6875C69.4801 28.0814 68.7699 27.589 67.8892 27.2102C67.0085 26.8314 66.0568 26.5 65.0341 26.2159L61.4545 25.1932C59.1818 24.5398 57.3826 23.607 56.0568 22.3949C54.7311 21.1828 54.0682 19.5966 54.0682 17.6364C54.0682 16.0076 54.5085 14.5871 55.3892 13.375C56.2794 12.1534 57.4725 11.2064 58.9688 10.5341C60.4744 9.85227 62.1553 9.51136 64.0114 9.51136C65.8864 9.51136 67.553 9.84754 69.0114 10.5199C70.4697 11.1828 71.625 12.0919 72.4773 13.2472C73.339 14.4025 73.7936 15.714 73.8409 17.1818H70.4318ZM85.9964 39.5114C84.6139 39.5114 83.3591 39.2509 82.2322 38.7301C81.1054 38.1998 80.2105 37.4375 79.5476 36.4432C78.8847 35.4394 78.5533 34.2273 78.5533 32.8068C78.5533 31.5568 78.7995 30.5436 79.2919 29.767C79.7843 28.9811 80.4425 28.3655 81.2663 27.9205C82.0902 27.4754 82.9993 27.1439 83.9936 26.9261C84.9974 26.6989 86.0059 26.5189 87.0192 26.3864C88.3449 26.2159 89.4197 26.0881 90.2436 26.0028C91.0769 25.9081 91.683 25.7519 92.0618 25.5341C92.45 25.3163 92.6442 24.9375 92.6442 24.3977V24.2841C92.6442 22.8826 92.2607 21.7936 91.4936 21.017C90.736 20.2405 89.5855 19.8523 88.0419 19.8523C86.4415 19.8523 85.1868 20.2027 84.2777 20.9034C83.3686 21.6042 82.7294 22.3523 82.3601 23.1477L79.1783 22.0114C79.7464 20.6856 80.504 19.6534 81.451 18.9148C82.4074 18.1667 83.4491 17.6458 84.576 17.3523C85.7124 17.0492 86.8298 16.8977 87.9283 16.8977C88.629 16.8977 89.4339 16.983 90.343 17.1534C91.2616 17.3144 92.147 17.6506 92.9993 18.1619C93.861 18.6733 94.576 19.4451 95.1442 20.4773C95.7124 21.5095 95.9964 22.892 95.9964 24.625V39H92.6442V36.0455H92.4737C92.2464 36.5189 91.8677 37.0256 91.3374 37.5653C90.8071 38.1051 90.1016 38.5644 89.2209 38.9432C88.3402 39.322 87.2654 39.5114 85.9964 39.5114ZM86.5078 36.5C87.8336 36.5 88.951 36.2396 89.8601 35.7188C90.7786 35.1979 91.4699 34.5256 91.9339 33.7017C92.4074 32.8778 92.6442 32.0114 92.6442 31.1023V28.0341C92.5021 28.2045 92.1896 28.3608 91.7067 28.5028C91.2332 28.6354 90.6839 28.7538 90.0589 28.858C89.4434 28.9527 88.8421 29.0379 88.255 29.1136C87.6773 29.1799 87.2086 29.2367 86.8487 29.2841C85.9775 29.3977 85.1631 29.5824 84.4055 29.8381C83.6574 30.0843 83.0514 30.4583 82.5874 30.9602C82.1328 31.4527 81.9055 32.125 81.9055 32.9773C81.9055 34.142 82.3364 35.0227 83.1982 35.6193C84.0694 36.2064 85.1726 36.5 86.5078 36.5ZM105.467 9.90909V39H102.115V9.90909H105.467ZM114.96 9.90909V39H111.607V9.90909H114.96ZM127.52 39.5114C126.137 39.5114 124.883 39.2509 123.756 38.7301C122.629 38.1998 121.734 37.4375 121.071 36.4432C120.408 35.4394 120.077 34.2273 120.077 32.8068C120.077 31.5568 120.323 30.5436 120.815 29.767C121.308 28.9811 121.966 28.3655 122.79 27.9205C123.614 27.4754 124.523 27.1439 125.517 26.9261C126.521 26.6989 127.529 26.5189 128.543 26.3864C129.868 26.2159 130.943 26.0881 131.767 26.0028C132.6 25.9081 133.206 25.7519 133.585 25.5341C133.973 25.3163 134.168 24.9375 134.168 24.3977V24.2841C134.168 22.8826 133.784 21.7936 133.017 21.017C132.259 20.2405 131.109 19.8523 129.565 19.8523C127.965 19.8523 126.71 20.2027 125.801 20.9034C124.892 21.6042 124.253 22.3523 123.884 23.1477L120.702 22.0114C121.27 20.6856 122.027 19.6534 122.974 18.9148C123.931 18.1667 124.973 17.6458 126.099 17.3523C127.236 17.0492 128.353 16.8977 129.452 16.8977C130.152 16.8977 130.957 16.983 131.866 17.1534C132.785 17.3144 133.67 17.6506 134.523 18.1619C135.384 18.6733 136.099 19.4451 136.668 20.4773C137.236 21.5095 137.52 22.892 137.52 24.625V39H134.168V36.0455H133.997C133.77 36.5189 133.391 37.0256 132.861 37.5653C132.33 38.1051 131.625 38.5644 130.744 38.9432C129.864 39.322 128.789 39.5114 127.52 39.5114ZM128.031 36.5C129.357 36.5 130.474 36.2396 131.384 35.7188C132.302 35.1979 132.993 34.5256 133.457 33.7017C133.931 32.8778 134.168 32.0114 134.168 31.1023V28.0341C134.026 28.2045 133.713 28.3608 133.23 28.5028C132.757 28.6354 132.207 28.7538 131.582 28.858C130.967 28.9527 130.366 29.0379 129.778 29.1136C129.201 29.1799 128.732 29.2367 128.372 29.2841C127.501 29.3977 126.687 29.5824 125.929 29.8381C125.181 30.0843 124.575 30.4583 124.111 30.9602C123.656 31.4527 123.429 32.125 123.429 32.9773C123.429 34.142 123.86 35.0227 124.722 35.6193C125.593 36.2064 126.696 36.5 128.031 36.5ZM164.32 39H155.343V9.90909H164.718C167.54 9.90909 169.955 10.4915 171.962 11.6562C173.97 12.8116 175.509 14.4735 176.579 16.642C177.649 18.8011 178.184 21.3864 178.184 24.3977C178.184 27.428 177.644 30.0369 176.565 32.2244C175.485 34.4025 173.913 36.0786 171.849 37.2528C169.784 38.4176 167.275 39 164.32 39ZM158.866 35.875H164.093C166.498 35.875 168.492 35.411 170.073 34.483C171.655 33.5549 172.834 32.2339 173.61 30.5199C174.387 28.8059 174.775 26.7652 174.775 24.3977C174.775 22.0492 174.391 20.0275 173.624 18.3324C172.857 16.6278 171.711 15.321 170.187 14.4119C168.662 13.4934 166.763 13.0341 164.491 13.0341H158.866V35.875ZM183.638 39V17.1818H186.991V39H183.638ZM185.343 13.5455C184.69 13.5455 184.126 13.3229 183.653 12.8778C183.189 12.4328 182.957 11.8977 182.957 11.2727C182.957 10.6477 183.189 10.1127 183.653 9.66761C184.126 9.22254 184.69 9 185.343 9C185.996 9 186.555 9.22254 187.019 9.66761C187.493 10.1127 187.729 10.6477 187.729 11.2727C187.729 11.8977 187.493 12.4328 187.019 12.8778C186.555 13.3229 185.996 13.5455 185.343 13.5455ZM193.131 39V17.1818H196.369V20.4773H196.597C196.994 19.3977 197.714 18.5218 198.756 17.8494C199.797 17.1771 200.972 16.8409 202.278 16.8409C202.525 16.8409 202.832 16.8456 203.202 16.8551C203.571 16.8646 203.85 16.8788 204.04 16.8977V20.3068C203.926 20.2784 203.666 20.2358 203.259 20.179C202.861 20.1127 202.439 20.0795 201.994 20.0795C200.934 20.0795 199.987 20.3021 199.153 20.7472C198.33 21.1828 197.676 21.7888 197.193 22.5653C196.72 23.3324 196.483 24.2083 196.483 25.1932V39H193.131ZM216.497 39.4545C214.395 39.4545 212.581 38.9905 211.057 38.0625C209.542 37.125 208.372 35.8182 207.548 34.142C206.734 32.4564 206.327 30.4962 206.327 28.2614C206.327 26.0265 206.734 24.0568 207.548 22.3523C208.372 20.6383 209.518 19.303 210.986 18.3466C212.463 17.3807 214.187 16.8977 216.156 16.8977C217.293 16.8977 218.415 17.0871 219.523 17.4659C220.631 17.8447 221.639 18.4602 222.548 19.3125C223.457 20.1553 224.182 21.2727 224.722 22.6648C225.261 24.0568 225.531 25.7708 225.531 27.8068V29.2273H208.713V26.3295H222.122C222.122 25.0985 221.876 24 221.384 23.0341C220.901 22.0682 220.209 21.3059 219.31 20.7472C218.42 20.1884 217.368 19.9091 216.156 19.9091C214.821 19.9091 213.666 20.2405 212.69 20.9034C211.724 21.5568 210.981 22.4091 210.46 23.4602C209.939 24.5114 209.679 25.6383 209.679 26.8409V28.7727C209.679 30.4205 209.963 31.8172 210.531 32.9631C211.109 34.0994 211.909 34.9659 212.932 35.5625C213.955 36.1496 215.143 36.4432 216.497 36.4432C217.378 36.4432 218.173 36.3201 218.884 36.0739C219.603 35.8182 220.223 35.4394 220.744 34.9375C221.265 34.4261 221.668 33.7917 221.952 33.0341L225.19 33.9432C224.849 35.0417 224.277 36.0076 223.472 36.8409C222.667 37.6648 221.672 38.3087 220.489 38.7727C219.305 39.2273 217.974 39.4545 216.497 39.4545ZM239.494 39.4545C237.449 39.4545 235.688 38.9716 234.21 38.0057C232.733 37.0398 231.597 35.7093 230.801 34.0142C230.006 32.3191 229.608 30.3826 229.608 28.2045C229.608 25.9886 230.015 24.0331 230.83 22.3381C231.653 20.6335 232.799 19.303 234.267 18.3466C235.744 17.3807 237.468 16.8977 239.438 16.8977C240.972 16.8977 242.354 17.1818 243.585 17.75C244.816 18.3182 245.825 19.1136 246.611 20.1364C247.397 21.1591 247.884 22.3523 248.074 23.7159H244.722C244.466 22.7216 243.898 21.8409 243.017 21.0739C242.146 20.2973 240.972 19.9091 239.494 19.9091C238.188 19.9091 237.042 20.25 236.057 20.9318C235.081 21.6042 234.319 22.5559 233.77 23.7869C233.23 25.0085 232.96 26.4432 232.96 28.0909C232.96 29.7765 233.225 31.2443 233.756 32.4943C234.295 33.7443 235.053 34.715 236.028 35.4062C237.013 36.0975 238.169 36.4432 239.494 36.4432C240.366 36.4432 241.156 36.2917 241.866 35.9886C242.577 35.6856 243.178 35.25 243.67 34.6818C244.163 34.1136 244.513 33.4318 244.722 32.6364H248.074C247.884 33.9242 247.416 35.0843 246.668 36.1165C245.929 37.1392 244.949 37.9536 243.727 38.5597C242.515 39.1562 241.104 39.4545 239.494 39.4545ZM262.463 17.1818V20.0227H251.156V17.1818H262.463ZM254.452 11.9545H257.804V32.75C257.804 33.697 257.941 34.4072 258.216 34.8807C258.5 35.3447 258.86 35.6572 259.295 35.8182C259.741 35.9697 260.209 36.0455 260.702 36.0455C261.071 36.0455 261.374 36.0265 261.611 35.9886C261.848 35.9413 262.037 35.9034 262.179 35.875L262.861 38.8864C262.634 38.9716 262.316 39.0568 261.909 39.142C261.502 39.2367 260.986 39.2841 260.361 39.2841C259.414 39.2841 258.486 39.0805 257.577 38.6733C256.677 38.2661 255.929 37.6458 255.332 36.8125C254.745 35.9792 254.452 34.928 254.452 33.6591V11.9545Z"
                            fill="black" />
                        <path
                            d="M35.0225 6.39372C35.7327 6.88591 36.1053 7.73669 35.9718 8.58747L31.4718 37.8375C31.3663 38.5195 30.9514 39.1172 30.3468 39.4547C29.7421 39.7922 29.0178 39.8343 28.378 39.5672L19.9686 36.0726L15.1522 41.2828C14.5264 41.9648 13.5421 42.1898 12.6772 41.8523C11.8124 41.5148 11.2499 40.6781 11.2499 39.75V33.8718C11.2499 33.5906 11.3553 33.3234 11.5452 33.1125L23.3296 20.2593C23.7374 19.8164 23.7233 19.1343 23.3014 18.7125C22.8796 18.2906 22.1975 18.2625 21.7546 18.6633L7.453 31.3687L1.24441 28.2609C0.499097 27.8883 0.0209716 27.1429 -0.000122149 26.3133C-0.0212159 25.4836 0.414722 24.7101 1.13191 24.2953L32.6319 6.29528C33.3843 5.86638 34.3124 5.90857 35.0225 6.39372Z"/>
                    </svg>
                </div>
                <div>
                    <img src="{{ asset('svg/menu.svg') }}" alt="menu">
                </div>

                <div>sheen</div>
                <div>active</div>
            </div>

            <div class="nav-section">
                <div>abd algader sirag</div>
                <div>
                    <img class="avatar" src="{{ asset('images/default.jpeg') }}" alt="avatar">
                </div>
                <div>
                    <img src="{{ asset('svg/notification.svg') }}" alt="notification">
                </div>
            </div>


        </div>
        <div id="main-container">
            <div id="side-panel"></div>

                @livewire('client.index')
        </div>
    </div>
    @livewireScripts
</body>

</html>
