<?php
interface AC_MetaboxInterface
{
  public function register();
  public function render(string $post);
  public function save(string $post_id);
}
