<script src="{$url}src/images-grid.js"></script>
        <link rel="stylesheet" href="{$url}src/images-grid.css">
        {foreach $dsanh as $key => $value}
            <div class="col-md-12 col-xs-12 canduoi" style="padding-top: 10px">
                <div class="col-md-12 col-xs-7 col-sm-6" style="padding-right: 0px; padding-left: 0px">
                    <span class="tieude"><i style="color: rgb(255, 202, 0);" class="fa fa-folder-open" aria-hidden="true"></i>{$value.sTencodau}</span>
                </div>
                <div style="background: #F90667" class="col-md-12 col-xs-5 col-sm-6 kengang1"></div>
            </div>
            <div>
                
            </div>
            <div class="{$value.sTenthumuc}"></div>
            <script>
                $('.{$value.sTenthumuc}').prev().imagesGrid({
                    images: [
                        {foreach $value.listimg as $key1 => $value1}
                            { src: '{$url}files/{$value.sTenthumuc}/{$value1.sTenanh}'},
                        {/foreach}
                    ],
                    align: true
                });
            </script>
        {/foreach}

