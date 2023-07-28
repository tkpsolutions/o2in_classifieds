<?php
if ($businessId > 0) {
?>
    <div style="text-align: center; margin-top: 10px; margin-bottom: 20px">
        <div class="btn-group" role="group" aria-label="...">
            <a href="business.php?id=<?php echo $businessId; ?>" class="btn btn-default">Basics</a>
            <a href="business-detail.php?id=<?php echo $businessId; ?>" class="btn btn-default">Details</a>
            <a href="business-tag.php?id=<?php echo $businessId; ?>" class="btn btn-default">Tags</a>
            <a href="business-timing.php?id=<?php echo $businessId; ?>" class="btn btn-default">Timings</a>
            <a href="business-contact-view.php?id=<?php echo $businessId; ?>" class="btn btn-default">Contacts</a>
            <a href="business-images.php?id=<?php echo $businessId; ?>" class="btn btn-default">Gallery</a>
            <a href="business-product-view.php?id=<?php echo $businessId; ?>" class="btn btn-default">Catalogue</a>
            <a href="business-service-view.php?id=<?php echo $businessId; ?>" class="btn btn-default">Service</a>
            <!-- Single button -->
            <div class="btn-group">
                <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Token Management <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="business-token.php?id=<?php echo $businessId; ?>">Create Single Token</a></li>
                    <li><a href="business-token-bulk.php?id=<?php echo $businessId; ?>">Create Bulk Tokens</a></li>
                    <li><a href="business-tokens.php?id=<?php echo $businessId; ?>">Search Tokens</a></li>
                </ul>
            </div>
        </div>
    </div>
<?php
}
?>