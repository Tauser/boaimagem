<x-app-layout >
    <section class="banner" >
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-xl-8 offset-xl-2">
                    <div class="pageBannerContent text-center">
                        <h2>Blog</h2>
                        <div class="pageBannerPath">
                            <a href="{{route('sobre')}}">HOME</a>
                            <span class="brdSeparator">&nbsp;/&nbsp;</span>
                            <span>SOBRE</span></div>
                      </div>
                </div>
            </div>
        </div>
    </section>
        <section class="blogPageSection">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1">
                        <div class="blogGridView blGridNoSidebar">
                            <svg class="blgsvg_1">
                                <filter id='warp' x='0%' y='0%' width='100%' height='100%'>
                                    <feTurbulence type="fractalNoise" baseFrequency="0.01 0.04" numOctaves="1" result="warp" id="turbulence"></feTurbulence>
                                    <feOffset dx="0" dy="0" result="warpOffset"></feOffset>
                                    <feDisplacementMap xChannelSelector="R" yChannelSelector="G" scale="30" in="SourceGraphic" in2="warpOffset"></feDisplacementMap>
                                </filter>
                            </svg>
                            <svg class="blgsvg_2">
                                <filter id='warp2' x='0%' y='0%' width='100%' height='100%'>
                                    <feTurbulence type="fractalNoise" baseFrequency="0.01 0.04" numOctaves="1" result="warp" id="turbulence2"></feTurbulence>
                                    <feOffset dx="0" dy="0" result="warpOffset"></feOffset>
                                    <feDisplacementMap xChannelSelector="R" yChannelSelector="G" scale="30" in="SourceGraphic" in2="warpOffset"></feDisplacementMap>
                                </filter>
                            </svg>
                            <div class="row">
                                {{-- BEGIN DATA --}}
                                @foreach ($posts as $post)
                                <div class="col-md-6">
                                    <div class="blogGridRow">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="blogImgThumbnail" data-aos="fade-up" data-aos-offset="300" data-aos-easing="" data-aos-duration="800">
                                                    <div class="">
                                                        <img src="{{$post->getThumbnail()}}" alt="{{$post->title}}" >
                                                    </div>
                                                    <span class="blPostDate">
                                                        <span class="blPostDay strokeText">{{$post->getFormattedDateDay()}}</span>
                                                        <span class="blPostMonth">{{$post->getFormattedDateMonth()}} <br> {{$post->getFormattedDateYear()}}</span>
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="blogContent02">
                                                    <div class="blogMata no-cursor" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="600">
                                                        <span class="blogCcat ">
                                                            @isset($post->category)
                                                                {{$post->category->name}}
                                                            @endisset
                                                        </span>
                                                        <span class="blogAuth">por&nbsp;<a href="javascript:void(0);">{{$post->user->name}}</a></span>
                                                        <span class="blogAuth">&nbsp;{{$post->published_at->diffForHumans() }}</span>
                                                    </div>
                                                    <h2 class="dfCursor" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="750"><a href="{{route('post.view', $post)}}">{{$post->title}}</a></h2>
                                                    <p class="blogDesc" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="900"></p>
                                                    <div class="button-wrap right">
                                                        <a class="boozyLinkBTN" href="{{route('post.view', $post)}}" data-aos="fade-up" data-aos-easing="linear" data-aos-duration="950">
                                                            <div class="button-text sticky right btnWrapper_sm"><span>Ler artigo completo</span></div>
                                                            <div class="iconWrapper parallax-wrap iconWrapper_sm" style="transform: translate(0px, 0px);">
                                                                <div class="button-icon parallax-element" style="transform: translate(0px, 0px);">
                                                                    <i class="boozy-long-r-arrow"></i>
                                                                </div>
                                                            </div>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endforeach
                                {{-- END Data --}}

                            </div>
                        </div>

                        {{$posts->links()}}

                    </div>
                </div>
            </div>
        </section>
        <!-- END: Service FAQ  -->
</x-app-layout>
