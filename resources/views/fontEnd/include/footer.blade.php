<aside class="col-md-4 sm-padding">
    <div class="sidebar-wrap">

        <div class="single-sidebar bd-grey bg-white">
            <a href="#"><img src="{{ asset('storage') }}/{{ $appearance->banner_sidebar }}" alt="Sidebar Ad" class="img-w1"></a>
        </div><!-- /.single-sidebar -->

        <div class="single-sidebar no-padding">
            <a href="https://www.accuweather.com/en/us/new-york-ny/10007/weather-forecast/349727" class="aw-widget-legal">
                <!--
                By accessing and/or using this code snippet, you agree to AccuWeather’s terms and conditions (in English) which can be found at https://www.accuweather.com/en/free-weather-widgets/terms and AccuWeather’s Privacy Statement (in English) which can be found at https://www.accuweather.com/en/privacy.
                -->
            </a><div id="awcc1499974479079" class="aw-widget-current"  data-locationkey="" data-unit="c" data-language="en-us" data-useip="true" data-uid="awcc1499974479079"></div><script type="text/javascript" src="../../../oap.accuweather.com/launch.js"></script>
        </div><!-- /.single-sidebar -->

        <div class="single-sidebar no-padding">
            <div class="side-tab">
                <ul class="tab-menu mb-15">
                    <li class="active"><a href="#recent" data-toggle="tab">Recent</a></li>
                    <li><a href="#popular" data-toggle="tab">Popular</a></li>
                    <li><a href="#comments" data-toggle="tab">Comments</a></li>
                </ul>
                <div class="tab-content bd-grey padding-15">
                    <div class="tab-pane fade in active" id="recent">

                        <ul class="list-post-items">
                            @foreach($posts as $post)
                            <li>
                                <img src="{{ asset("storage/postImage/{$post->id}.{$post->image}")}}" height="80" alt="Image">
                                <div class="list-post-content bd-grey">
                                    <h4 class="fz-14"><a href="#">{{ $post->title }}</a></h4>

                                    <p class="fz-12 fw-6 tt-u no-margin">{{ $post->subtitle }}</p>
                                </div>
                            </li>
                            @endforeach

                        </ul>
                    </div> <!-- /#recent -->
                    <div class="tab-pane fade in" id="popular">

                        <ul class="list-post-items">
                            <li>
                                <img src="{{ asset('endUser') }}/img/tab-1.jpg" alt="Image">
                                <div class="list-post-content bd-grey">
                                    <h4 class="fz-14"><a href="#">William Braynt went to visit the grabl</a></h4>

                                    <p class="fz-12 fw-6 tt-u no-margin">national Octobar 2017</p>
                                </div>
                            </li>
                            <li>
                                <img src="{{ asset('endUser') }}/img/tab-2.jpg" alt="Image">
                                <div class="list-post-content bd-grey">
                                    <h4 class="fz-14"><a href="#">William Braynt went to visit the grabl</a></h4>

                                    <p class="fz-12 fw-6 tt-u no-margin">national Octobar 2017</p>
                                </div>
                            </li>
                            <li>
                                <img src="{{ asset('endUser') }}/img/tab-3.jpg" alt="Image">
                                <div class="list-post-content bd-grey">
                                    <h4 class="fz-14"><a href="#">William Braynt went to visit the grabl</a></h4>

                                    <p class="fz-12 fw-6 tt-u no-margin">national Octobar 2017</p>
                                </div>
                            </li>
                            <li>
                                <img src="{{ asset('endUser') }}/img/tab-4.jpg" alt="Image">
                                <div class="list-post-content bd-grey">
                                    <h4 class="fz-14"><a href="#">William Braynt went to visit the grabl</a></h4>

                                    <p class="fz-12 fw-6 tt-u no-margin">national Octobar 2017</p>
                                </div>
                            </li>
                        </ul>

                    </div> <!-- /#popular -->
                    <div class="tab-pane fade in" id="comments">

                        <ul class="list-post-items">
                            <li>
                                <img src="{{ asset('endUser') }}/img/tab-1.jpg" alt="Image">
                                <div class="list-post-content bd-grey">
                                    <h4 class="fz-14"><a href="#">William Braynt went to visit the grabl</a></h4>

                                    <p class="fz-12 fw-6 tt-u no-margin">national Octobar 2017</p>
                                </div>
                            </li>
                            <li>
                                <img src="{{ asset('endUser') }}/img/tab-2.jpg" alt="Image">
                                <div class="list-post-content bd-grey">
                                    <h4 class="fz-14"><a href="#">William Braynt went to visit the grabl</a></h4>

                                    <p class="fz-12 fw-6 tt-u no-margin">national Octobar 2017</p>
                                </div>
                            </li>
                            <li>
                                <img src="{{ asset('endUser') }}/img/tab-3.jpg" alt="Image">
                                <div class="list-post-content bd-grey">
                                    <h4 class="fz-14"><a href="#">William Braynt went to visit the grabl</a></h4>

                                    <p class="fz-12 fw-6 tt-u no-margin">national Octobar 2017</p>
                                </div>
                            </li>
                            <li>
                                <img src="{{ asset('endUser') }}/img/tab-4.jpg" alt="Image">
                                <div class="list-post-content bd-grey">
                                    <h4 class="fz-14"><a href="#">William Braynt went to visit the grabl</a></h4>

                                    <p class="fz-12 fw-6 tt-u no-margin">national Octobar 2017</p>
                                </div>
                            </li>
                        </ul>

                    </div> <!-- /#comments -->
                </div>
            </div>
        </div><!-- /.single-sidebar -->

        <div class="single-sidebar">
            <h3 class="fw-8 fz-18 tt-u mb-30">News Category</h3>
            <ul class="cat-list">
                @foreach($categories as $category)
                <li><a href="#">{{ $category->name}}</a></li>
                @endforeach

            </ul>
        </div><!-- /.single-sidebar -->

        <div class="single-sidebar">
            <h3 class="fw-8 fz-18 tt-u mb-30">Subscribe News24</h3>
            <form action="#" class="subscribe-form">
                <input type="email" name="email" placeholder="Enter Your Email">
                <input type="submit" value="Subscribe">
            </form>
        </div><!-- /.single-sidebar -->

        <div class="single-sidebar">
            <div id="calendar_wrap" class="calendar_wrap">
                <table id="wp-calendar">
                    <caption>July 2017</caption>
                    <thead>
                    <tr>
                        <th scope="col" title="Monday">M</th>
                        <th scope="col" title="Tuesday">T</th>
                        <th scope="col" title="Wednesday">W</th>
                        <th scope="col" title="Thursday">T</th>
                        <th scope="col" title="Friday">F</th>
                        <th scope="col" title="Saturday">S</th>
                        <th scope="col" title="Sunday">S</th>
                    </tr>
                    </thead>

                    <tr>
                        <td colspan="3" id="prev" class="pad">&nbsp;</td>
                        <td class="pad">&nbsp;</td>
                        <td colspan="3" id="next" class="pad">&nbsp;</td>
                    </tr>

                    <tbody>
                    <tr>
                        <td colspan="5" class="pad">&nbsp;</td><td>1</td><td>2</td>
                    </tr>
                    <tr>
                        <td>3</td><td>4</td><td>5</td><td>6</td><td>7</td><td><a href="" aria-label="Posts published on July 8, 2017">8</a></td><td>9</td>
                    </tr>
                    <tr>
                        <td>10</td><td>11</td><td><a href="" aria-label="Posts published on July 12, 2017">12</a></td><td><a href="" aria-label="Posts published on July 13, 2017">13</a></td><td>14</td><td>15</td><td>16</td>
                    </tr>
                    <tr>
                        <td>17</td><td>18</td><td>19</td><td id="today">20</td><td>21</td><td>22</td><td>23</td>
                    </tr>
                    <tr>
                        <td>24</td><td>25</td><td>26</td><td>27</td><td>28</td><td>29</td><td>30</td>
                    </tr>
                    <tr>
                        <td>31</td>
                        <td class="pad" colspan="6">&nbsp;</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div><!-- /.single-sidebar -->

    </div><!-- /.sidebar-wrap -->
</aside><!-- sidebar block -->
</div><!-- /.main-content -->

</div><!-- /.container -->
</section><!-- /.main-wrapper -->

<footer class="footer-wrapper bg-dark">
    <div class="footer-widgets padding">
        <div class="container">
            <div class="col-md-4 col-xs-6 sm-padding">
                <div class="single-widget">
                    <a href="#" class="footer-logo"><img src="{{ asset('storage') }}/{{ $appearance->logo }}" alt="News24"></a>
                    <p class="text-light no-margin">News24 is a Clean Responsive HTML News-paper, Magazine, News and Blog template. with good feature that allow you to completely customize your website to your needs.</p>
                </div>
            </div><!-- widget 1 -->
            <div class="col-md-4 col-xs-6 sm-padding">
                <div class="single-widget">
                    <h3>Most Viwed</h3>
                    <div class="footer-posts">
                        <div class="footer-post">
                            <span class="date">Oct 28, 2016</span>
                            <h4><a href="#">Success is not a good teacher failure makes you humble</a></h4>
                        </div>
                        <div class="footer-post">
                            <span class="date">Oct 28, 2016</span>
                            <h4><a href="#">Success is not a good teacher failure makes you humble</a></h4>
                        </div>
                    </div><!-- /.footer-posts -->
                </div>
            </div><!-- widget 2 -->
            <div class="col-md-4 col-xs-12 sm-padding">
                <div class="single-widget">
                    <h3>Most Viwed</h3>
                    <ul class="tag-list">
                        <li><a href="#">Worlds</a></li>
                        <li><a href="#">Entertainment</a></li>
                        <li><a href="#">Health</a></li>
                        <li><a href="#">Football</a></li>
                        <li><a href="#">News</a></li>
                        <li><a href="#">Fasion</a></li>
                        <li><a href="#">Health</a></li>
                        <li><a href="#">Western Foods</a></li>
                        <li><a href="#">Western Foods</a></li>
                        <li><a href="#">Race</a></li>
                        <li><a href="#">Football</a></li>
                        <li><a href="#">Foods</a></li>
                    </ul>
                </div>
            </div><!-- widget 3 -->
        </div>
    </div><!-- /.footer-widgets -->
    <div class="footer-copyright ptb-40">
        <div class="container">
            <div class="col-xs-6 xs-padding xs-text-center">
                <p class="no-margin fz-13 text-light">&copy; Copyright 2017-2018, All Rights Reserved</p>
            </div>
            <div class="col-xs-6 xs-padding">
                <ul class="footer-social text-right xs-text-center">
                    <li><a href="{{$link->facebook}}"><i class="ti-facebook"></i></a></li>
                    <li><a href="{{$link->twitter}}"><i class="ti-twitter"></i></a></li>
                    <li><a href="{{$link->google}}"><i class="ti-google"></i></a></li>
                    <li><a href="{{$link->linkedin}}"><i class="ti-linkedin"></i></a></li>
                    <li><a href="{{$link->youtube}}"><i class="ti-youtube"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
</footer><!-- /.footer-wrapper -->
<a data-scroll href="#header" id="scroll-top" class="scroll-to-top"><i class="ti-angle-up"></i></a>
<!-- All Scripts -->
<script src="{{ asset('endUser') }}/js/vendor/jquery-1.12.4.min.js"></script>
<script src="{{ asset('endUser') }}/js/vendor/waypoints.min.js"></script>
<script src="{{ asset('endUser') }}/js/vendor/wow.min.js"></script>
<script src="{{ asset('endUser') }}/js/vendor/bootstrap.min.js"></script>
<script src="{{ asset('endUser') }}/js/vendor/jquery.nicescroll.min.js"></script>
<script src="{{ asset('endUser') }}/js/vendor/owl.carousel.min.js"></script>
<script src="{{ asset('endUser') }}/js/vendor/jquery.meanmenu.min.js"></script>
<script src="{{ asset('endUser') }}/js/vendor/smooth-scroll.min.js"></script>
<script src="{{ asset('endUser') }}/js/vendor/jquery.counterup.min.js"></script>
<script src="{{ asset('endUser') }}/js/vendor/jquery.swipebox.min.js"></script>
<script src="{{ asset('endUser') }}/js/vendor/jquery.newsTicker.min.js"></script>
<script src="{{ asset('endUser') }}/js/main.js"></script>
@section('footer')
    @show

</body>

</html>
