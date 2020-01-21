<?php
function setActiveRoute($name)
{
	return request()->routeIs($name) ? 'active' : '';
}

function setActiveCollapse($collapse)
{
	return request()->routeIs($collapse) ? 'collapse in' : 'collapse';
}
