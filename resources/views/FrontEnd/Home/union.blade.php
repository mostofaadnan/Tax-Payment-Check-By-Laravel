<script>
     $.fn.extend({
        treed: function(o) {

            var openedClass = 'glyphicon-minus-sign';
            var closedClass = 'glyphicon-plus-sign';

            if (typeof o != 'undefined') {
                if (typeof o.openedClass != 'undefined') {
                    openedClass = o.openedClass;
                }
                if (typeof o.closedClass != 'undefined') {
                    closedClass = o.closedClass;
                }
            };

            //initialize each of the top levels
            var tree = $(this);
            tree.addClass("tree");
            tree.find('li').has("ul").each(function() {
                var branch = $(this); //li with children ul
                branch.prepend("<i class='indicator glyphicon " + closedClass + "'></i>");
                branch.addClass('branch');
                branch.on('click', function(e) {
                    if (this == e.target) {
                        var icon = $(this).children('i:first');
                        icon.toggleClass(openedClass + " " + closedClass);
                        $(this).children().children().toggle();
                    }
                })
                branch.children().children().toggle();
            });
            //fire event from the dynamically added icon
            tree.find('.branch .indicator').each(function() {
                $(this).on('click', function() {
                    $(this).closest('li').click();
                });
            });
            //fire event to open branch if the li contains an anchor instead of text
            tree.find('.branch>a').each(function() {
                $(this).on('click', function(e) {
                    $(this).closest('li').click();
                    e.preventDefault();
                });
            });
            //fire event to open branch if the li contains a button instead of text
            tree.find('.branch>button').each(function() {
                $(this).on('click', function(e) {
                    $(this).closest('li').click();
                    e.preventDefault();
                });
            });
        }
    });

</script>
<section class="explore-area">
    <div class="container">
        <div class="card custom-card">
            <div class="card-header custom-card-header">
                <h5>Union</h5>
            </div>
            <div class="card-body">

                <div class="row">

                   @foreach($unions as $union)
                    <div class="col-sm-12">
                        <div class="area-box" style="width:100%;">
                            <ul id="tree{{ $union->id }}">
                                <li  style="border-bottom:1px green solid; margin-top:0px !important;"><a href="#">{{ $union->name }}</a>
                                    <ul>
                                        @foreach( $union->AreaDetails as $area )
                                        <li><a href="{{ route('front.area.details',$area->id) }}">{{ $area->name }}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <script>
                    $('#tree{{ $union->id }}').treed({
                        openedClass: 'glyphicon-folder-open',
                        closedClass: 'glyphicon-folder-close'
                    });
                    </script>
                    @endforeach

                </div>
            </div>
        </div>
    </div>

