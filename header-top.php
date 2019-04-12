<div class="header_1">
    <ul class="ul-header_1">
        <?php
            foreach($socialsHeader as $key => $values) : ?>
                <li>
                    <a class="<?= $values['class']?>" href="#"><i class="<?= $values['icon']?>"></i></a> 
                </li>
            <?php endforeach
        ?>
    </ul>
    <div class="language">
        <i class="fas fa-globe-americas"></i>
        <select>
            <option value="vi">English</option>
            <option value="en">Tiếng Việt</option>
        </select>
    </div>
</div>