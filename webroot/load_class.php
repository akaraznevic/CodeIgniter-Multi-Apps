<?php 
function &load_class($class, $directory = 'libraries', $prefix = 'CI_')
{
	static $_classes = array();

	// Does the class exist?  If so, we're done...
	if (isset($_classes[$class]))
	{
		return $_classes[$class];
	}

	$name = FALSE;

	// Look for the class first in the shared/libraries folder
	// then in application/libraries folder
	// then in the native system/libraries folder
	foreach (array(SHAREDPATH, APPPATH, BASEPATH) as $path)
	{
		if (file_exists($path.$directory.'/'.$class.'.php'))
		{
			$name = $prefix.$class;

			if (class_exists($name) === FALSE)
			{
				require($path.$directory.'/'.$class.'.php');
			}

			break;
		}
	}
	
	// Is the request a class extension?  If so we load it too
	foreach (array(SHAREDPATH, APPPATH, BASEPATH) as $path)
	{
		if (file_exists($path.$directory.'/'.config_item('subclass_prefix').$class.'.php'))
		{
			$name = config_item('subclass_prefix').$class;
	
			if (class_exists($name) === FALSE)
			{
				require($path.$directory.'/'.config_item('subclass_prefix').$class.'.php');
			}
	
			break;
		}
	}

	// Did we find the class?
	if ($name === FALSE)
	{
		// Note: We use exit() rather then show_error() in order to avoid a
		// self-referencing loop with the Excptions class
		exit('Unable to locate the specified class: '.$class.'.php');
	}

	// Keep track of what we just loaded
	is_loaded($class);

	$_classes[$class] = new $name();
	return $_classes[$class];
}
?>