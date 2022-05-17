<?php
    namespace Photos;

    class Photo
    {
        private $id;
        private $image;
        private $text;

        public function __construct($image, $text, $id)
        {
            $this->id = $id;
            $this->image = $image;
            $this->text = $text;
        }

        public function get_html()
        {
            return "<a href='../phpPages/imagePost.php?id={$this->id}'> <div class='photo'>   <img src='{$this->image}' alt=''/>    <p>{$this->text}</p>   </div> </a> ";
        }

    }
