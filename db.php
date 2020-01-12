<?php

session_start();

$conn =  pg_connect(getenv('DATABASE_URL'));