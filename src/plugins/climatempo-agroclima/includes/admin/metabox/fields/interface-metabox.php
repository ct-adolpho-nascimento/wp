<?php
interface MetaboxInterface {
  public function register();
  public function save($post_id);
}
