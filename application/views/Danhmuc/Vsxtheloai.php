    
    <div class="col-md-12 col-xs-12">
        <div class="x_panel">
            <div class="x_title" style="font-size: 25px">
                Sắp xếp thể loại
            </div>
            <div class="clearfix"></div>
            <div class="x_content">
                <div class="dd">
                    <ol class="dd-list">
                    {foreach $theloai as $key => $value}
                        <li class="dd-item" primarykey="{$value.PK_iMatheloai}" style="cursor: move;" data-id="3">
                            <div class="dd-handle">{$value.sTentheloai}</div>
                        </li>
                    {/foreach}
                    </ol>
                </div>
                <br>
                <button type="button" name="sx" class="btn btn-success">Lưu</button>
            </div>
        </div>
    </div>

    <script src="{$url}public/js/sapxep.js"></script>
    <script>
        sapxep();
    </script>