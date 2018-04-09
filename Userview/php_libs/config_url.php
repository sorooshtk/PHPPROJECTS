<?php
class config_url{
    private $url;
    private $strip;
    private $Count;
    private function url_configuration(){
        if ('' == $this->url) {
            return $this->url;
        }
        $this->url = preg_replace('|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-\\xff]|i', '', $this->url);
        $this->strip = array('%0d', '%0a', '%0D', '%0A');
        $this->url = (string) $this->url;
        $this->Count = 1;
        while ($this->Count) {
            $this->url = str_replace($this->strip, '', $this->url, $this->Count);
        }
        $this->url = str_replace(';//', '://', $this->url);
        $this->url = htmlentities($this->url);
        $this->url = str_replace('&amp;', '&#038;', $this->url);
        $this->url = str_replace("'", '&#039;', $this->url);
        if ($this->url[0] !== '/') {
            // We're only interested in relative links from $_SERVER['PHP_SELF']
            return '';
        } else {
            return $this->url;
        }
    }
    protected function sanitize_url(){
        return $this->url_configuration();
    }
    public function finilize_sanitization(){
        return $this->sanitize_url();
    }
}
$urlSanitize_Objective = new config_url();
$urlSanitize_Objective->finilize_sanitization();
?>
