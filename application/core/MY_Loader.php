<?php
/**
 * /application/core/MY_Loader.php
 *
 */

class MY_Loader extends CI_Loader {
    public function template($template_name, $vars = array(), $return = FALSE)
    {
		$vars["view"] = $template_name;
		if($return) {
			$content  = $this->view('header', $vars, $return);
			$content .= $this->view($template_name, $vars, $return);
			$content .= $this->view('footer', $vars, $return);
			return $content;
		} else {
			$this->view('header', $vars, $return);
			$this->view($template_name, $vars, $return);
			$this->view('footer', $vars, $return);
		}
    }
}
