<?php
	function gravatar_image($email_address)
	{
		return 'http://gravatar.com/avatar/'.md5($email_address);
	}
?>