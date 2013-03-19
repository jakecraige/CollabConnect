<?php
	function gravatar_image($email_address)
	{
		return 'http://gravatar.com/avatar/'.md5($email_address);
	}
	function skills_to_list($skills)
	{
		$skillset = '';
		if(!empty($skills))
		{
			foreach($skills as $skill)
			{
				$skillset .= " $skill";
			}
			$skillset = trim($skillset); //Get rid of initial space when creating list
		}
		return $skillset;
	}

	function display_skills($skills)
	{
		if(!empty($skills))
		{
			$skills = explode(' ', $skills);
			echo '<ol>';
			foreach($skills as $skill)
			{
				echo "<li>$skill</li>";
			}
			echo '</ol>';
		}
		else
		{
			echo '<p>No skills selected.</p>';
		}
	}
?>