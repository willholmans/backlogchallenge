<?php

	class Backlog extends Eloquent
	{
		protected $table = 'backlog';	
		protected $fillable = array('points', 'priority', 'title');
	}
