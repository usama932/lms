@extends('frontend.layouts.master')
@section('title', @$data['title'])
@section('content')
    <!--Bradcam S t a r t -->
    @include('frontend.partials.breadcrumb', [
        'breadcumb_title' => @$data['title'],
    ])
    <!--End-of Bradcam  -->

    {{-- Forum Area s t a r t --}}
    <div class="forum-area">
        <div class="container">
            <div class="row">

            </div>
        </div>
    </div>
    {{-- End-of Forum Area --}}



     <!-- Get-in Touch S t a r t-->
     <div class="ot-sidebar-overlay"></div>
     <section class="ot-filter-course section-padding">
         <div class="container">
             <div class="row">
                 <!-- Course Search -->
                 <div class="col-lg-12">
                     <div class="searching-course mb-20">
                         <div class="grid-list-view d-flex flex-wrap justify-content-between">
                             <!-- Search Box -->
                             <form action="#" class="search-box-style">
                                 <div class="responsive-search-box">
                                     <input class="ot-search " type="text" value="" placeholder="Search Courses">
                                     <!-- icon -->
                                     <div class="search-icon">
                                         <i class="ri-search-line"></i>
                                     </div>
                                     <!-- Button -->
                                     <button class="search-btn">Search</button>
                                 </div>
                             </form>
                             <!-- End Search Box-->

                             <!-- Search-tab -->
                             <div class="search-tab">
                                 <button class="tab-btn">Interesting</button>
                                 <button class="tab-btn">Bountied</button>
                                 <button class="tab-btn">Week</button>
                                 <button class="tab-btn">Month</button>
                             </div>
                         </div>
                     </div>
                 </div>

                 <!-- Left Sidebar -->
                 <div class="col-xl-3 col-lg-3">
                     <div class="sidebar-wrapper bg-transparent mb-24">
                         <!-- Mobile Device -->
                         <div id="otSidebarBtnOpen" class="responsive-bar">
                             <div class="sticky-icon">
                                 <i class="ri-equalizer-line"></i>
                                 <span>Filters</span>
                             </div>
                         </div>
                         <nav class="ot-sidebar" id="ot-sidebar">
                             <div class="ot-sidebar-btn-close" id="otSidebarBtnClose"><i class="ri-close-fill"></i></div>
                             <div class="accordion" id="accordionExample">
                                 <div class="accordion-item ot-checkbox-dropdown">
                                     <h4 class="accordion-header" id="headingOne">
                                         <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            Featured Topic
                                         </button>
                                     </h4>
                                     <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                         <ul class="ot-checkbox-dropdown-list ">
                                             <li>
                                                 <label>
                                                     <input class="ot-checkbox" type="checkbox">Web Design (26)
                                                     <span class="ot-checkmark"></span>
                                                 </label>
                                             </li>
                                             <li>
                                                 <label>
                                                     <input class="ot-checkbox" type="checkbox" >IT & Software (35)
                                                     <span class="ot-checkmark"></span>
                                                 </label>
                                             </li>
                                             <li>
                                                 <label>
                                                     <input class="ot-checkbox" type="checkbox" >UI/UX Design (12)
                                                     <span class="ot-checkmark"></span>
                                                 </label>
                                             </li>
                                             <li>
                                                 <label>
                                                     <input class="ot-checkbox" type="checkbox" >Graphics (75)
                                                     <span class="ot-checkmark"></span>
                                                 </label>
                                             </li>
                                             <li>
                                                 <label>
                                                     <input class="ot-checkbox" type="checkbox" >Art & illustrations (102)
                                                     <span class="ot-checkmark"></span>
                                                 </label>
                                             </li>

                                         </ul>
                                         <span class="text-tertiary text-16 mb-20 d-block font-500">+36 More</span>
                                     </div>
                                 </div>
                                 <div class="accordion-item ot-checkbox-dropdown">
                                     <h4 class="accordion-header" id="headingTwo">
                                         <button class="accordion-button " type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                                            Category
                                         </button>
                                     </h4>
                                     <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                         <ul class="ot-checkbox-dropdown-list ">
                                             <li>
                                                 <label>
                                                     <input class="ot-checkbox" type="checkbox">Darrell Steward
                                                     <span class="ot-checkmark"></span>
                                                 </label>
                                             </li>
                                             <li>
                                                 <label>
                                                     <input class="ot-checkbox" type="checkbox" >Savannah Nguyen
                                                     <span class="ot-checkmark"></span>
                                                 </label>
                                             </li>
                                             <li>
                                                 <label>
                                                     <input class="ot-checkbox" type="checkbox" >Wade Warren
                                                     <span class="ot-checkmark"></span>
                                                 </label>
                                             </li>
                                             <li>
                                                 <label>
                                                     <input class="ot-checkbox" type="checkbox" >Jane Cooper
                                                     <span class="ot-checkmark"></span>
                                                 </label>
                                             </li>
                                             <li>
                                                 <label>
                                                     <input class="ot-checkbox" type="checkbox" >Darlene Robertson
                                                     <span class="ot-checkmark"></span>
                                                 </label>
                                             </li>
                                             <li>
                                                 <label>
                                                     <input class="ot-checkbox" type="checkbox" >Arlene McCoy
                                                     <span class="ot-checkmark"></span>
                                                 </label>
                                             </li>
                                         </ul>
                                         <span class="text-tertiary text-16 mb-20 d-block font-500">+36 More</span>
                                     </div>
                                 </div>

                             </div>
                         </nav>
                     </div>
                 </div>
                 <!-- Right Content Result -->
                 <div class="col-xl-9 col-lg-9">

                     <div class="row g-24">
                        <div class="col-lg-12">
                            <div class="single-forum">
                                <div class="listCap">
                                    <div class="forum-img">
                                        <a href="#"><img src="https://arenadigest.com/wp-content/uploads/2016/06/forum.jpg" class="img-cover" alt="images"></a>
                                    </div>
                                    <div class="recentCaption">
                                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                                            <h5><a href="#" class="title font-600 mb-0 line-clamp-1">Unleashing the Power of Learning: A Comprehensive Guide. Comprehensive GuideComprehensive Guide</a></h5>
                                        </div>
                                        <p class="pera text-14 mb-6 line-clamp-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer</p>
                                        <div class="tag-area4 d-flex align-items-center flex-wrap gap-10">
                                            <ul class="listing">
                                                <li class="single-list">Design learning</li>
                                                <li class="single-list">UX Design</li>
                                                <p class="d-inline-blog">Created by <strong class="text-title">Jhon Cameron</strong> | 5 Posts</p>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="single-forum">
                                <div class="listCap">
                                    <div class="forum-img">
                                        <a href="#"><img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAoHCBUVFBcVFRUXGBcZGhoaGRoaGhoaHR0gHR0aHRkaHRkdICwjGiApHhkZJDYkKS0vMzMzHSI4PjgwPSwyMy8BCwsLDw4PHhISHjIpIykyMjIyMjIvMjQyMjIyNjI0NDIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMjIyMv/AABEIAJcBTQMBIgACEQEDEQH/xAAbAAACAwEBAQAAAAAAAAAAAAAEBQIDBgABB//EAEQQAAIBAwMBBQYCBwYFAwUAAAECEQADIQQSMUEFEyJRYQYycYGRsSOhFEJSwdHw8QdTYpKi4RUzcoKyY8LSFiRDc4P/xAAaAQADAQEBAQAAAAAAAAAAAAABAgMABAUG/8QALhEAAgIBBAIBAwMCBwAAAAAAAAECEQMEEiExE0FhFCJRI3GBBTIzNLHB0fDx/9oADAMBAAIRAxEAPwDJowqZQV4iVYEY165xke6qQtiu2GvCIyf5+QpXwrMueDraEzgiDGYz9KmbdRtIo91Cm4yZ3eInk54xGBV6g1PFkWSNopkg8cqZWFqxFFSC1ZsqpM8FqrVtjqaiq1IKaW2HgvTTgjBrhpzPFeII4ohLjVN7g/aV9zFehatW4K9RvShufsNIpKVwtGjN46AV6pobzbShNOaJFhQPWrkaf1Yq8AKMj4xU3k5HUeAVbY869u2hGDNWNEwFMfz0opdOp6/ehKdc2GMG+KEypnANEJpi3Iimmn7N8eWAX1onV2rY8K7iTyYx/vSPUR3UiqwS22Z59KZxn4V36IwEkVoNN2dbPJafIRP51G32e8yQY9Yn6Dmm+ojdWL4J1aQhSeBzRSaVj71PDolP6p+I/pVfcz4QQCPPH5mmjqI32JLTyq6Fg0A5xNVtb6QabMVXDHxehrlW5EhRB4NUeprhEFpm3bFL2V9TUP0cHg0fdacNEjmDQwIHAo+RuJtqUgM2jNc7wsA0VvJ/Vqh7bfsH6UtjVyUNuYVUUokI1eCy3kaN0agbafKuzRfcmvDbbypbHBVFSiaJFk+ledzU3IZRRUloE8TXr2o6Vb3cVxQdTS3bKeiCI3QVIq46V6DHFeb6SSTfRWEml2ZcW6vSqdtSBNeieeEBaruKAAWEgEciRziR8YrraFjE/Pyou3ZFyBmJ5MjiT+7864NZqoY4OL7aO3R6aU5qXpM8e4roBOREAgZwvkB1H1LeQqsWqL/Q4M5PJgyRyDAnivNTZK5XI5j94PUVw/07VwhcH7fB2f1DTSnU16XIMLdTRK5X9KsU+le3uPGosW1PpXotVyt6VYjjypXINE7WnJ6j51IWBXC9Uv0g0rbNRNLIq1LAoLV9rW7UG4YngAScdfQfGh7ftEbk91bVwDG5n2ifhtNQyZVHstDG5dDu3pQeoq4aYDkZrPajty4ls3AiOcYggDzOJwPjSyx7Z3J8a2h6eMfnuP2qP1MWr5LLTZL9G17kcigu1dati011sxAC/tMcAfz0Bqrszt5Ls+B8CZQi4v1GZ9IpZ7XMt1bCrumWbIK42wMEevyiknqYbXzyUhpp7kmiOj9rLrLvNhSvoTP1+R6Uvt9u3VuTcvXNpByBAQyCPCiw2BE+tX6cKEVAQdgj+fzoHtSxCEftNLfXH2j5V5n1Lm9r6PV+mjFWkbfsvXtclS5ZhB90AqM5YQIkggGMwaZi8/FYzVaIlg6sytEeEkHnGRWs9n77XLKySzISpJ5PUEnqYIzVdNqIyW18sjqNPKL3R4Rc11hlRXh1Lk5mje7Ned36V17o/g5dsn7KbLsRkkfA1Y9sHlZ+dTXHFS3HyobvwNt/JS7QAdn8/GuOskZT+fpVjOeoqtrhHA/KmTv0I+PZWROQqL+ZqvugeXA+Ve7vjUXtnoDVVJ/ki4x9or7uDhqgWP7VWEeYP51Ex5U29k3BFaqf2j96mwnkn7V31r0KPOtuYNqOVF6KPqa5z5gV6bY8zUTbH7VJYzSZW6DyqkoPKrytdtprADFB5VEqPKiCtVkVjWUFfSvO7npVxFeQaIUzL7KkLVHdx6VbbsTXU8lHLsFZuQGVfeiPrBn6UVo9UEChgScyRPWAD14GIoG7orhZ/FMXDkCMFQVBM9Bj41yaVy2WYSMQR5/0r5nVTjObbfs+o00HGEUl6HX6U26QBt49YxOOZqT6hdvhEsJERg858ziB8qFt6aFHizHUnHpHB+tQGhcYNzq24gR1hcs3pwROK5Y13Z0Sj6ot7jygj7elS7o1Ps6wwkGImcHMnzwIxHnzRvcV9Pp8+7HFv8HzGpw7ckkgAW/WvdlHjTCpDTireRHPsYCLZqQtmjxYFWLpxQ8iNsZm+0fZ61fYuwYORG9WPTjHBrGdraE6a+UVtypsaSo3dDyM/avrS6ceVYH2le2+ocowZWCKI89oEfWoZZRovi3XRQ/bC4KDd54KqZ5BB+eelVab8R1TaBIOcTx8P30sTUqrBIIycmAOvxo3s3tLZdQsoAEg9eR4TA6RBrjlHjhHZGTvs0nZ+guBD3I2PAl7Z8RiSNykQR060f8A8Kv3bai9eO9Z2ggKRxgsoHkOZoPs3tW5vxbQ9QMnC88Hz6x5Vqtu7apcI7AHaWyOP1eeRzXl55ZFL/tnqYNu0x9nRXLVxWaSokstwSGgGOBIq1XW9utrpUVyPCyvwRB42qI+fWtyUuSPHjrBB6+vpVGosuTMAj1VD9ql5pe1yWSi/wD0wd8XbRysHyBOB8Mz8KLuPbZibV91hSR4biEwJjKiZ9POtNc0oaZtIT57WB+ZBqI7Itgk7Tkz72BgcT0x+dbypc1z8D7F1fAu7E9obhud077hEhnlGEcjxgb+fj8ab6vt/uwhZWIeSCCkYiZJb1FSu9loyBQZCg7QQpGTkSB6UMOybaiCiL5wsAz69astY0uCH02OTuxhoe2EuA7TBHKsNpg8EdCPgTV6ds252i7aJGCA6mPjBxWCV7WmuHbJKkFl2MRIA4MRmQZ9at9nr03ltnvCHJB8CADB8zPPl5nzrq88trdf7HPLDFSqz6CLzNwQY8s1cpcDxLjzijfZ3Sju9zeJj16RAOBNOP0ZZmKrjz3HlHBlpTaRmGQnj7H7VdasXowk/GK0m0eVRLj4VnnJcszw0l+fdUfSprorn6yKf59KdtdXzqs6pfX6Gt5n+DbWxS+hEZtj5Cf3VR/woeVOzq18j9KidUnr9DW88kB4mI27IH8zUW7HX4U8OoXoG/ymoNd/wN9K31EjeFmfbsn1qt+yj+0Kfs5/u2qtmb+7NN55G8IgPZjedUt2e9aAsf7tqiyt+wfnTrOweIzb6Nx0qv8ARn8q0vdP+wPrXmw/sfmKZakPhfoxKoamQen8/KkR19w4CmP+vP2oV3bICcdd3z/Z5zUJ61tVFV/J3Y/6fTuTv+DTX9J4bpAbxqkSl2JAIYnw4wcUq0VplCILbPsyHJmZaecfatmnur+IQGRei4/maV3NWqIW71gNzKu1QT5ifD0kD5da8je3aas9OLrrgX6G5yxA3FgWQyAApx5iSB5Z6kVZ2g/ebwoCklWUzHG2VJgQYWPLrNHpqYuMWuSsW+AOWVjHGOPPzoqxe3kFHIAKghgDzuGCORj70G6d0N8igXikk21AJn/moBwAPtRendWVW3KJBMblOZgLIOTFMmublf8AEJA2gyoEGTMeHjirO5uJZO0hiEYAbcEzjrirQ1U4pR9I5cmGDuTXLAltivRbFdo2uMdr2mHmwIj6Ez9Jpium9DXrx1MZK0zzJ6WUXTQCLYqxUqd3VWU5aT5Kdx/Lj50t1HbJPhtWwPVpZv8AKMD86SeqjHtjQ0k5dIaIgr5/7cez1uwtu5akF3KuCxPILKR1AEEc9RWm2ai571xgPjt/0pAI+M0o9peywtu3GWNwCf8AsfyqC18ZSUUdH0MoRcm/4EfsX2AmovsLviRELFZYFiSAPEDMcnp0o72o0CJrQiAhVtWlUScBQVAGZ4A+cnrRnsol2zcc2wslMhxIYBh6jr5Vd2oWv60Oyd2e7UFRnjdnjrNaeqjyvgENNLh+rJ9jaa5aystK5BPOQf1pEzW11XYy3rLW7m1iy7ZKK20+mB1/rSm1Z2hYA8q0/wDxC0uC6A+pFcWLJuk5VydOeOxJI+Y6TsN9Lq2tAqdjBkOwAMjwYgtKwQRyeJrb2exTdtncGWQdoUuhB/VO9HmJzH9KWau8LutZ7eR3dsTHk1wE/DFaPT9qWraIly7bQ8QWAz5Z6+lM5OWW36FlKUcSr32fOzY1mk1SWrj3LgMXF3XGcMhBUqSZKkPnjpWsvaTVXLDNpzteRtLbOhE4fERj7VV2vcW5rLbKZ/BPQj9c4INNLfaS2bagrcuMS0KizwROcAc9T5xNGUlLKr9IKclitdtmN7C7d1Fx3t31g21KtKqIuKSHB29PLHzo32k117TG2xtK1t4BY22hWMlfErQZgCCAc/KqLSd5qdRc7twGuEkMYYeFMHxY86a+2XaavpGQ23BNy1tJAIxcQzIOJUH/ADAUUsbyPj+AtzUY1/JmOzLNzU37a7dve+K4Vsu4tjKqWJZYDFYz6+VH9uaK7obltxD2y4VWKqo3FC3uqZ5BGT09acdido2tOrs+CVXgZO3d146jmhvaTt2xqrNsWy0reQkMu0jwv/GnjJShur8iT3LLVjf2M7Z1DhEuIsmWeIG0RgjxnEwOvNbbd6ViOytamnG9yQI2cE5x5cDHJo+97Y6dCQ77fKQZJ9ABx68YNTxzlJWc+pwvfwjTG56GuDT0r512j7fMf+VsQAnLOrFh0ERCng9aSaj2z1BBG47pJlXWCOggKCPjPXiqKMmTWB++D6h2p2za04m4xmJ2qCzRxMDgSQJMCSM1X2J27b1SllV0g+7cCgkeYAYyPWvmnZ+mualWvFiC5iC7TgMuTySSRz+yKsfWIbj6feyPbttuKGIRyrMN8SSBsn+tLu5r8dl1pE49n1k3FHWqzcHSvlfY2tGlVL9svct3MSzQze9gz1Hw6VrOyfaRb0gju2kBQxnd6AwBP+HmjV9CPTuJpzcFRLj1r5r7a9uX7OpUW9Q1te7VtoK7ZlxJBGZgYJIrGXdezuzNeZyxkku5n0jdHUwOB0rojppSV2Rk1F0feXvIMEgH1MVhPYbW3H1GoW5cuOMmGZmAIYDAY8wYx0ArB2SgObZ/yqfzrQezPafcXGubGZGWCFKbvPgsOD5Usse1PkrBWj6mXFQLisRqPb60hg2nk8ZXM0x7I9p7V8ZYW3k+AkxAODvKgGRGBxSeOSVjqro0Zeob6AGuQ8XF+orjrE/vF/zChXyUS+D5Z2PrFIuBgZGM9CD0pjq+7O/b6R9Kxr9ouoJ7tQScmT+dDv2m+GZcHJg5p5aPc7ToaGtcVT5Pt2kSUt+tsfZaX67s/crjAh5y0DgGsxp/am8ttVW0ohRBLegiRs9KrT2ivsSSqCZmGAn/AE+lcy000yr1EaNLfKqlxiPdsBoByYW5wQZmifZ64r2EYAiSBDTOHYdSTWSHbV7O1bYMATIaI4xt+NTXt7VAzNsT/hXpx0xRlp249i/UJn0JLUbsjz6nrSTWe0iW4TzB5nzyPIwRWY7S7f1uwkOAI/wnPyGao3m4ls3DkqWPTLGTyK2PSPtk5ZkNO0faG24Xd3g2tuBRipmCMQQSIJ69eKXa72zDLtAunpEMk/MNQjWMCB9cmruzOx7l22DCg4mcfGBzXZHHDGuSTyTm6iK9B2qWdVYOoJ5Ak+eR9zNaDsp7jSP0Zrm1mXcVszMzt8ecCOtRfsY22XAOcEZyBJ6elbb2b0C/is/ButHToJrZMkKtCKMl2IbJu7p7m4hEgCbQBYychTHT15oXtbU3WFsXLLWhvkEsjT4WBjb8a2jaO2zhlcMjEMrAgggjEHrPnST270wS3aZeBdj6qx5+VQk4viuSkW1XIq0VrfchXZDDEkcxK4+H8Kr1Km3q9pZmm2hlueXEflV3s+v4zEz7pH2Nd2zaJ1an/wBJfyZ64qqTXwdqlaX7mm0/SlnY1uxcuatnQXVTYF73aYy3ee8YGQWOBiOYpvpxha+W9p9o37dy/btOVR2cXQFXxBWbBkExk8RzVtJDdaXwc+rnVG77K1enu6i42mAFsKi4XaJBYmB5QRmgvaLtG2bhtXLpti0wYqAx3nDLIAO74D60D/Z6QN4bapx1ifUz16Ul9uj/APeXQCI/DOODNtR+6qwxXmaFlkrHFm5L7r9sldsWzj4t967tTV91cQwSRuK8R4gA27r1Gf6Us7B1hu3dx/ZWB5STQXtvrriahVVoAtqwiJ8RMz/lH0qMMTeWi08kYwv0M+yV725dd0TcxBMAESVUYJ+BrKavtq7dZbVy5cdd0AEwB4wTMe9x1rTex7M1pmYksWzPOPOspf1QF+3aW2ixeM3B7x2kyPTMT8KphX3yX4EyO4xldDT2svd3aQwMnEDK/AfKs92LZe4y3A0qjqCJiCSIx8T+dP8A+0QRYtkf3g/Nbn8KTeyrfg3T5XrP3P8AtVsH+WtfJPPzqEv2N/2pr3s27ZCqQzhTMnG0mMDHHNZf2V7P7zUXGa3b2qgjcsQSx4aJ4HPrT/ty2LlpQw8PeA5H/ptx5Gc/Ks3Yu91K21UAgGCNxEjIn5feo6dpY6XbOjLF7rfRVev/AI1wSvd21baJWLjAACWmCCc46V5p9Uq2GdnBus5hZXwqFMQPVj5ZiiBrWO4wgJ/wj0P3rrOruFiPBkNHhXB5B49Dj1q27jol77Hvs92hZt2kt3Lqd40vHiAyxJExBOCMUH2l2crXbrgZYySMGDyDPyx8fKqtCjsqBmxct72AROdtwMRjGUWOnNH6TUMm23ONhMwvIe+DiPRD5eH1qTW2TaY6prkr09y3YuWkVDbLAhXwW3YESJ/a4OMjHWkusuG3a3puJdwtwEnadhuFXAAAU89Tg1b7V3zvs73AH4kYA/UstkgebH60X2NasXB4O7YyQfxGDefulciCOlOv04qT5T7A/wBSW3hNGd1Wvu3XF26EusiBPEvIUsRJ65Y5oG9rgrbe7WePD5RE/wA+VOfaHRCzfTICXd0KOFjaDnylp4EcZpBrtMLdzzYAEEEkEESIJ5wY+M16GKcZRTXtHn5Yyg2vwHjXqz+NgihSMA9Ssjr5c0ys61DsFu4IEbhuIxHT/b1rJMhJ3GRPn/Co92Jify/fTeOJJ5ZtmsvolxgVYEkbZJ3CRxnz6fOgrHatuwVZ7ZbIgDE7SCDkec49eaQtYPQ5Hy+FUai4SQTnGT5misafHo3lkv3Nda9rrQYE2nKmC6ypmNkETxG35+lE3fam2YKWwBAG0txAHp5kj5T1rF2NKW9PPpRVqwVmBIPnBpHpsSfQ61WWuw+/p0g+EdfvS2+g7sYEwf3081Kc/OldxPwh8W+7VHG+C80amz2a7BR3hhrSsAAIBPQ/UUs/RGC3DvbwsBEkHO6ePIitVoJ22THOnU4//nmhLdh3N62Ghu9Xxc4huh5qLk1IfamhOmmi2xZzJt22BOYO5wcn4CqdDbDIF3sX3JIB6F4MGAeDVvadk+AycWVnJAJW4wnHxqns3/mKTPha2cMTy4ERVL4sWldHXuz/AA3gxaV2wCx/bgmOuDXjatw4Q2wcxMicHJjNPO09MoOp2tMqG6SpFyY9OOtZrUhhqE8TGWAyfMkT/Ipk7QrVMc9qk2wp7pc+6S2T8QAY+tMew+02KsvdSVWQqFmJnoYXwz86G9q3YBCWJAYgZOANuOk/71R7HX2ZtUyNlEBIIHMn4454rmcnPDb9f8nUoqGWl7Gei7WF64w7t0e2GBVkIIHhM5IyNpxFaH2P7SNy3cBtMALjZM9YMADM5rNdg3WTXasbpBtPc+BUAgEeXjOPQU//ALObr3dLcd/eNwmBgZCk/KSaTKvstdcCuXPPz/qEpeuaVrFhLT3QFClye7UbZjBBnA86G9qnZrNsm3sHerBkcbHxj0p4+mBvIpBmOrkHrwB0P50r/tBULYtCdo75eWj9S550kVJyQHJCrs9slhjPp5Car1bn9JTcf/x9Y/aby+NCdhOu5RJJM/rTOJ4Bz1ojt+2FvWSDEo0z6MMVOUUpOPwdEZfan8mw03C/z0rBa7Svbv3WTIa47Qwt7ZLNyC8nEwIjxfTYdkMJUTnaOpOBIHNIu2O0dPau3A20yTuw5MgtwYgSxHXoa2nlKLairBljFv7nRH2R02y+Qx3My7iSEB5fnaSOg6zVHtj2Mz6i7cCGGVNpDIACAskggk4B+tH9i31bUK1oKFNtTwerMJ5HmKt9qmuC7IZCoQEKVPWd3HoKrinLytvglkgtqS5FnsnbKXSDOUXkg5B4BUD7Cqf7Qb22/bnE21/8n4wf3Vb2K629QDuJLqJGIWIMQPd5PNDf2h2u8vWoIH4eCWAyCzQRzkCBjmBVYf49+qFnfioP9idUvdMrOoIY8kAnjMYrE3roGtYTIGpciP8ArcfPFNPZu49p3tzxn3to9OAfMUBquz379roBjvGZoDEAb2Ytv/jHE02OCWSfyJkdwjXo0/twQdNbbydD/pf+NIewbs2L0f3tk/6j/Pzp/wC1FhX0iKS0G4mRkjkTwfOkHYtg27d1TIm7aifQx++p6evA/wB2Vyp+dP4Nf2y8aVGJ924s+eUdf3zWPbUgeZjG6RJxyZHNbH2iKDRFmBIBQwOSYx8vWvnVrU7pGF8gc/nFNo4KULYNVkcZUho+qEcH64qtNcVYGPP7R++hELmfKOkEY9RXlxypPhBiRkeWJFdixROV5ZGn0PaaoLUgytseUbZvT6z4h9KLTWJuJnA7wA+fivkVjv0p+doIVNswYz8+cmrm17pa3BR4fTnoeTz4z9anLTK7HjqHwi/241PeNaAEAG5/42R/7azXZ2vu2bge2SHz+Yg/fmmt9xqFDbjI3EAgCD144GKK9m9Nt1FpyVJ3HAzggj5ZirRjGMNrVkJOUsm6y3Waw6pCbuGUrtO7iQ+/aY4MKY/wjypfrVKuFbH4aRIn9r6Yj8qmynuribf11JAJmF38xHmOeM1TpdO5/VURkgGZgdTwMSflWhFRXHQcknJ/IFqWHANUqTRV/TsolkjymAWJ560OunuD9QgecTVkRaJ22JohF3fsj1IJ+wND2UJPWfI+n+1NOy7aqSX4JWJB6hvTyINB8BSBHtEGI+f76hvbyHz/AKUXriBclDA2QCDzDHHn0qm0wE7gTPp/GhYXEb6lGg+E8+vkPSlJU93x1bofNqYXtfZaVt2pYld3IU7l8UFmERESRB6dCVd3tDaFGy0FZZACAnrmW4yPWowxui8p3yjd6HvO708AyNOq8Hytc1GzZ3PqJna7IU4zHOD8aU+zXbSZF0u0DBmV5G1QqiMCekefFE6zt8DNm2uwgAyoBLFgs7gSCApOMZHxpPG7Y3kRHtEKLW6cJae2ZI98XAQvxikOj14SXcEjdbjaOdrS2TxwBPqK87aE+JB4y3IMZGcZ5x+VLbdp7rZkZMnbJk5Zj5knyqsYKuSbm74Nrc1iXu8ZAFW5aBDEydzMWCwkwwgSKRav/mofJlz86WIl+2CZ2jpJ4GeB0PkeRPxk7Uud68e8n5Fazgl0FSb7H3tJqUYWwDkOsj5Dz54qv2DtgfpXi962C3x3uP4fWhO9G9ywOCCDVnZV4ILsfrW4MT+1JrmeJ+JxXs6fLeRSY57MAOuvN0fTXADxJKIPritD/ZuQNMyz7rD81X+FYLsPWMdUAOGtvP0A+1av2KcqjJJgiZxMqF6+eaWeNqFfsDcpSfybG7f/ABARELzj0P0pJ7b6n8BCfeF1TEifcf19fzo5rabYLNLHBmDMEiIieJj0rOe1Ln9CAJLEXsMTys3NnP8AhIHyrQh0I5d0U9iZuLOJ3f8Aif4V57Ukd9YgzCt/5A0u7P1RWORHl8I/k0BqWud4jO24NLKZkQTJAH6uTwYqLxXkv4OiM/06+TcWrpS2XHKqI+1ZPWWluXLnjG4sQy7hIMzkMcng09a5+C/TwfasbqdKe/e53gUyTMkGSMRA6Ec9JptLj2zbf4Bqp7oJGt9krTLfh+YB6RAPEDgc4FAf2ms36UsTHcqfT37gP2FUezepZb67ndpiC5DGMwAQACPr1zVf9pTu9606qSO5g/J3/jVI4/120c0pXiXwA+zN/wDEGT8+c1ofaHWOly3sIBK8ws/UiY+FZD2ZuTc8+P3079sbLk2nBhVVt3Hmvz86q4/eCMm4AmhY9885kD+AqvXPFy4DtPIBPInOM+tCaB2VpIM4/rzxTPU6i5tbxJtIIiFmGmQCBu+p+wpXH7mNupI0HagY6U7ZkFSIHkAftSHS7gG3FvetE7p5NwSQPXFaG/eP6GSmW8ERzkjjPMTWZW+wO17bLLIJIbMOGzPE5Nc2mj9kl8s6c8/1Ir4Rr/aO0Lmi2mMvb5IUfU1idVol4tgQDmZ5gdYzkfnW67ZRW0hUsFG5CSf61kGsWAIJd5kckDKlT+RPFNo5VAjq3UwZLa8fhLIIJGBMSCRkxx0M/KidZaVm8A7yRkr3kgkkkjCg8xBB4r03V/VVR64P3qTX7gzuj6H8gK61M47RTcsuEJK93PvSRtMDoD8+lCo6ww2g4JhZxjqBijl1DyPECZgCE3T5Rgz6DNdqNM3GzbkEiNuYxKzHHX1poz+DWjPG+wQxtPhkYnHnyMVb2Zq7lu4txtrWwchUAbjoYn6mmYsFDK2x5+EH6ghsHP3oTXa7OyGABJyT1z7vSqbrXBlTZB7J23BsUj3hBuAzuEGCfXM/lXgRpSAZMcHJBAG3zJk/l0r24zFlYAEMYIM9eeORRa2woZZjggyQPCeJ+R+lLbHaRQ+juKPEDkx0JEniATVdtdtxU/EEmAFUy3nC58qbNdKhHSSoJmSwMkR4RMEwWGBVGs1V8SHEjwrAZpJKqSQN2BlhEUyFpAes0rLlgqAYkEGP+0GenWliXHGe8MTjO30HXyo1bDMRIgSysIhgckDIx1obWdllk8BJuBzIggbYMGSBnz6Z+rrjgWXPJHU3pClmyODnHmBHrVmi1xRYEGTMlA3wgmaqbRNCbxiCJ5AJAjI4ivf0RsAiIA8jP+qtwbkI7644H4abTsJgFi0cyenFMNNbwyKi7wSUkEqFJMCTnHp++mKOvlHx+FQu6u1EF0kddw/jXM80n0jq8UV2F6vUMyratNdW0qMpV3VwW8O1tqoFBXP5cRkOzpWVdvhAE8LH74HNeK5Y+G42w8QfqAeaL/RbbE7QzL03kM0evSkc5/kZQj+BZZ7NRR+1BLCSCQTz8JihdRqGBiIG36GftTbWkKbceGXI8v1W/hS7XWizSkRx6zE9PUj/AHoxbb5BJJLgRdpXSI94yPlVm9u8nkgSN8xPwEf1q+/2ddOYkY4xx5TURIuA3FPlDA/X1rojVHO3yF2QxcwVkjMyIPP2r1bxRmByWWPCpP8AGqTeAuSFMZ4BirLd0MSZ2nbER6+vFLQ1hfstb36tSOFUgiCTnyArU+z2j7p2QbSRkHpzAx8B1rI9gaUtqVIQPt3HMES3Ez8/oa3PZdwpeubkC+FIEDjI6VPKPAObT7mtckgnMeakHgDmfPEUD7aof0bHHeIP/KnD64LBMQccgZn4+tJPa+650siI71P31OKGkZ7se7sv2wzAAGWJOANp5q32jS0t221twwbcW2nAMj75pZornjDNJAyQIkjqBPWve2XTdbe2rKrjhiGOIk8459KChctwd7Udvo1unebfnj+flXJ2Qrxc2hpyVjcMYgjmKH7PvzY5ztP2NJrntBd01wOsqI2yTgmCT4TjrzH6tKk74HteyT2ha1KASoKyMmME9DwKJ9pNCL+o0wYeFlZZng+Jh8fh/tXW7F3U3FvKiKse7DLySZUhNpB+OKb9rdnvbtpeuY2MYKknbMZKsonyxMc07bX3fAiSbr1Zne1ew10eqRbYbu2RSCxBJbO/IA9OR1o/X2u8Rhcfam2CCBnrySIyPPyzVOs7atPdXvbZYARuDQfMmCw9ODTS/wBo6Q2QypCgiXBbniGzuAkjHE0Y26b7BKlaRmLXZzC4RbR3URDKC2Rz7s9cUx1CLbRle3tYqYYxuElhkESMDiQccVBtSwum5aSUG33rY2mDki44JA8sxEcV5rtU1+O9IYAHaNxfB5M8Hj60epWJ6oO0+l/BcLqVyCFEKM/Nj9enNCpZLWFtyBcWCS5CLIYGDcbAMeuaTvpgFi3cvQTMB18oIEAH5Sf30K1s7lUSRzJBjzIkGeBRjGKToMpu02bu3ee/orh2f8t1DkMp90kTAaYMgzwRmkaWVJjb4vn+Q5NU6Lte4ltrdtoDAg+AEmeJJ5HP1qa37h5M9T0EzPpilxxhFNM028jsm+nULKruMxBx8c7cUs1Fm/MwtsAcBAwj1JM/OaI7R7HtPBdiTEg7pOcQRgnI6Uns2EtOTbDEGQZxwfSrqMa4IOL6D+zrty2W/ECqedoJn5bqMvalAPCWLcmfvJoLTItwxEH4k+s/7Vbb0wFwBSp54Ix04MEHPAms2MoOjx0uNxIgZAg/OIkYqqwnjyZOJ+oHA461C2Cn6lsbZzvyNvIK9IxImvdJqGndvbYwG6IO4gQMxievzrNGXBzqfCq58TYgHMAQPgZz600sdnuYLwOpXkn1YiB8hil6qF469SKs0yM5CpuPnBICg9WMflQSDXthjWLdxu7CLKkGSIyJiBzirbl9EuXEXcLhJ/FEuBIYlEaCLbCROZ9eIq0LbLjo0Ha5AuSZaBAmT5zAGKr1KK19gpYAuRhZ2knxmIA5kk+RzTfAAnsjSBwWAuBVEKFKndEnxyctJH6sfDp6+quhSvcOD0Zl3xHlCAH4ya7U6V+ItXEx4iqBowMDEeXXp50J2ratqVS3bUMSMQ4Mn3IggEc5yOeKwAND3r5cnnmBJ3NgAkAAA9D5UZa0V8YQuoxgED/3VfYsC0oW5jMkPZLbcDAaCI561cl22PdBg5woj5QorGZmBqLtuQRu/k1fb1tvG0AHrJYkfCZFG6u2wuXEIVoYgE4JByueeIqFzQow/ceQfiKipIdWc9yYjBj1/jnmqblgFgxLbgQwgjkYkbh86rNnb4QzL8gY+RipPc3c/Ufu8q1pAcxrpSpChwzEdSc4xkYE/ejraqxhNp+ef8tZ62PgR/ikk/MmrrFwHI+Y6CPSsUUm+xhe3J3z3C3doFZQFA/V8QBIyZHn9KM/Q5AMkjnpWc1mvvLuXD22BEMJ55BIMjrwaL03tTAi5bnHKnrmPCenA5qnL6F3K+Q7VaBYmSDkzj94rMsmSQ4cxwOT95rUJ23Zce9tIHDDnEkA/lQmt7JFwm5be2TiRAImOCV4560FJrsE43yhV2buW5uiBmZ5yCMYz8vKnljtIorFB49pCyMTM9DgUqBdHC3bexZA7xSCgHmZiBHnQms1N2Yt22ife2k/ToPrVXGL7ETkhtb7Vvbh3jBfUCdoJAMAcfEZ9aP/AEtrqlLlwMsjwsQCIPvSR9z19Ky9vs9hcU3H2SILYJOZyAwP1Pl50br7FoXLQttuQEywxuAifDJIAM+GpOKvgfc65NLptLZBPhSIg+Innn3eKz/bljbcUymxmfbtZyYke8H90+gJ615YdkzbFok9CigxPEiCfnVtntIB1D2hBBOG2jAEypQg+lZRozY27IujuwDnHHn6es0TqO2pChbaAgAAt42AziScRzAHWnns/etuge3aULkTvMggwQVFtaQ+0PZq223o7L3jN4ZAXrKqAvhGDgk1JcMo3aFNyyz3C7XNpLAkr4TwAPCsTxVtnVsGkwsc93AYjgySuD8P6pta9vI3Z8pwR1zx8qts37cA7gT5AcepnBkT16Zp2m1yTT54GdvSs+7uxJwcsonoCQeMnr60Z2iLXdptt3Ld4H8RD4lBEjcCwwYiNp4aKXSjA7C0xjAn0zwfhSa7rbiEocgNJgbc9YIoJfgZofaTXFbbo6i4OUORtYDEgTu5z9qEPaNtritBQwNwDbQTgcH69PWasIYiDJzwSSBx1Jx8qRXELXCIEbj8eeOtaNOwu0jQPsJnadxzjB+M8HzzNC63SuVImcxux8MgDHPNMUBUGJkQYgAzxGRmrLdvckor+RhW+c9B9etKm/QZRQLowFtruUlhujIGZ8P/AFR/PnRRuttRTzBgY890Tick81PTaZv1lKxxKzniZmpPYcE7QW+G3OOSCfOlcZN9DqUUhLbcG4WZAVLlTJKkDGZSGJjGOes0wu6bT7C67rmGcBVuAkZO3JBkAeVLruluLuIQyWBllMYM8gVOx2sbR8SksVhuFCjgEblaSZMnH7xZJkrVlvZpTctzbsRyQm6QSZAInbAMj5SCcVbds2lO6SWuZ2ooW4GHH4iSSJxH3oTU9tWmdnRDa6qoiAcZJGCcDIAxA6Uw0GotKM3FLkBiSD1xEny+mBFMLbfBS+k3ja/hAE92JZoJPvdTkE+UzXlmyQBbRdqDqRHqYEev89Tu5BuG5PKhInoCTMzHMceVeXXLfh2wN0A4/VBPl6xx/WiHoqXSqSLaoGZiBJ4Exlj8M+uPlLUXjbT8IOwW5+Jcg7mKklgGIC8gQOYHUV5pmDNdtcWtu246pcYlx+qzDw8SPPjJxU9HprZO1Hu2ip27TcKGTOSIby5Pn6wGJsX2tKl9ltrdhVJYeCGMkDJwGMCZgdcUzt9nm20KXViIJwZE8E7fnxTVzbQQ9raTJyUBycnwjaJ9PPih20tvDHJgyscRPWAOvIFAyQLqEe2m43nIGWUw2TgTwYnqDSrsfQd8xZxBA4ABJEtkTAgY6fShu0NfbuEbUYI3hk84KyVhiCDOJAo7s3XC2ndhHbM4uFflt4HxmgwoYavsuFCbmYTgMiOB5mDxQg0bW8LAH/6Vj5ZxiKsbttdwMXT8bkxPJgqZqF7t22D4LRbzLlQZ+Ikn58dKZGpBvtdoSAt6QOFeAc87TBJ4gj5jyrOgsB0/rFdXVyR6GycSKTcMnr5zVvd7sxHz+3lXV1MJHsrvOV3ycjaQOSQY6/Ol1rVwSTyTJPx9K6uqseguT3BFy65BKvgAHrmMn91B7yeQDj7f1rq6iLI8GDjnj+TRWh119SiW299isYGTMZ5+v5V1dTIyG+n19+6GUWkfbuRpbk5GZAkYOIz50RY7VV432mBAz4xEnywehmurqzQ9i72gvC8FFtdpDBi05iDgnBOf3Vd254rlloAGMScc11dWfSN7KLTEAmJAn7n+FcWBe2YiA8H/ALOK6upTGl9n+2HSbMKACIYDPi3RI45Xn1qz2i1ICXZuGShhPFBI3GSeOq/MV1dUn/eOv7T50LpJg8HFX2tEwyuMjMjrx8sGurquycTTafcoAgAbDJnnEnEfGkmsEuxIz1+ldXVCHsvL0aFLR2bl6AT5gYEj60iv223ksOcxg4I/hXV1Lj9mn6GnbdpnRjbER7pBjaAQDyZ4MfWspb7SvAgyGjEkCR1wwhvzrq6ujB0Sy9htn2pvJjc/nO7f9FuBwPh9qZ2Pbh8b1RhHVCrH/uViP9Ne11dFI502NdP7Y2yJay4Ecoyvj/u2Gr29o9FckOwJEyr22Px4Uj866upaKWAXdR2Zd90En/ALif8AxFVN2AhzaXUwc+I2SvPl3gb7811dWYPRFOwtQFlAGzMbwp5ngrA+pqm/qr9kFY7vcRuHhJ6xuuLl8TiABJgCurqQZHq9t3RsIZgUkyrMvUBgVVgDkDiJph/9UG4AGQK4yuxQFOTO7xSDgkc11dQfRkUXe07rAyxM+UT8NxzXmmvOAW3MEVYbcZzHAUTJnrifSurqQYpXQvbUW26mQNqYxzIPzjj6Cgr9oDkKw/xCfXHkfX1ryuovsDRXbuiDAgSYHQT0ovSdpvbLIbNm5EEF0UsJEwWwW+cxXV1A0ez/2Q==" class="img-cover" alt="images"></a>
                                    </div>
                                    <div class="recentCaption">
                                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                                            <h5><a href="#" class="title font-600 mb-0 line-clamp-1">Unleashing the Power of Learning: A Comprehensive Guide. Comprehensive GuideComprehensive Guide</a></h5>
                                        </div>
                                        <p class="pera text-14 mb-6 line-clamp-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer</p>
                                        <div class="tag-area4 d-flex align-items-center flex-wrap gap-10">
                                            <ul class="listing">
                                                <li class="single-list">Design learning</li>
                                                <li class="single-list">UX Design</li>
                                                <p class="d-inline-blog">Created by <strong class="text-title">Jhon Cameron</strong> | 5 Posts</p>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="single-forum">
                                <div class="listCap">
                                    <div class="forum-img">
                                        <a href="#"><img src="https://www.ohchr.org/sites/default/files/SiteCollectionImages/Issues/Business/PAL3872.jpg" class="img-cover" alt="images"></a>
                                    </div>
                                    <div class="recentCaption">
                                        <div class="d-flex align-items-center justify-content-between flex-wrap">
                                            <h5><a href="#" class="title font-600 mb-0 line-clamp-1">Unleashing the Power of Learning: A Comprehensive Guide. Comprehensive GuideComprehensive Guide</a></h5>
                                        </div>
                                        <p class="pera text-14 mb-6 line-clamp-2">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer</p>
                                        <div class="tag-area4 d-flex align-items-center flex-wrap gap-10">
                                            <ul class="listing">
                                                <li class="single-list">Design learning</li>
                                                <li class="single-list">UX Design</li>
                                                <p class="d-inline-blog">Created by <strong class="text-title">Jhon Cameron</strong> | 5 Posts</p>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                     </div>
                     <div class="row">
                         <div class="col-lg-12">
                             <!-- Pagination S t a r t -->
                             <div class="pagination mt-30">
                                 <p class="page-total mb-10">Showing <span>  9 Result </span> out of <span> 26 Courses</span></p>
                                 <ul class="pagination-list mb-10">
                                     <li class="wow ladeInRight" data-wow-delay="0.0s"><a href="#" class="page-number"><i class="ri-arrow-left-s-fill"></i></a></li>
                                     <li><span class="page-number current">1</span></li>
                                     <li><a href="#" class="page-number">2</a></li>
                                     <li><a href="#" class="page-number">3</a></li>
                                     <li class="wow ladeInLeft" data-wow-delay="0.0s"><a href="#" class="page-number"><i class="ri-arrow-right-s-fill"></i></a></li>
                                 </ul>
                             </div>
                             <!-- End-of Pagination -->
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     </section>
     <!--End-of Get-in Touch -->





@endsection
@section('scripts')

@endsection
