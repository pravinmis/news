<?php foreach ($extraButtons as $button) :

        $dataAttributeKeys = array_filter(array_keys($button), function ($key) {
          return substr($key, 0, 5) == 'data-';
            });
                ?>
