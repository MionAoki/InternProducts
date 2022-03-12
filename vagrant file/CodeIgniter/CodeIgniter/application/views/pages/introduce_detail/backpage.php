<div class="back_page">

                <?php if(isset($backfront[0])){ ?>
                <a href="<?php echo site_url('introduce/detail/'.($backfront[0]).''); ?>">
                <button type="button" class="btn btn-primary" style="height:50px;">
                前のどうぶつ
                </button>
                </a>
                <?php } ?>

                <a href="<?php echo site_url('loggedin/success'); ?>">
                <button type="button" class="btn btn-primary" style="width:30%; height:50px;">
                <ruby>一覧<rt>いちらん</rt></ruby>に<ruby>戻<rt>もど</rt></ruby>る
                </button>
                </a>

                <?php if(isset($backfront[1])){ ?>
                <a href="<?php echo site_url('introduce/detail/'.($backfront[1]).''); ?>">
                <button type="button" class="btn btn-primary" style="height:50px;">
                次のどうぶつ
                </button>
                </a>
                <?php } ?>

                </div>

