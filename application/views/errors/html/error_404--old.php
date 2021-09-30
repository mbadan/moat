<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>404 - Página não Encontrada</title>
		<script rel="stylesheet" href="/css/404.css" /></script>
		<style type="text/css">
#printer-404 {
  width: 300px;
  height: 300px;
  position: relative;
  margin: 5% auto;
}
#printer-404 .body {
  background: #666;
  width: 100%;
  height: 50%;
  border-radius: 16% 16% 0 0;
  position: relative;
  top: 28%;
}
#printer-404 .body:before {
  content: '';
  display: block;
  width: 11%;
  height: 22%;
  position: absolute;
  right: 11.5%;
  top: 22%;
  background: #fff;
  border-radius: 50%;
}
#printer-404 .back {
  width: 55%;
  height: 22%;
  background: #666;
  position: absolute;
  z-index: 1;
  left: 22.5%;
  top: 0;
}
#printer-404 .front {
  width: 55%;
  height: 43%;
  background: #666;
  position: absolute;
  z-index: 3;
  left: 22.5%;
  bottom: 1%;
  box-sizing: border-box;
}
#printer-404 .front div {
  position: absolute;
  background: #fff;
  top: 10%;
  bottom: 14%;
  left: 10%;
  right: 10%;
}
#printer-404 .paper1 {
  width: 55%;
  height: 50%;
  background: #666;
  position: absolute;
  z-index: 4;
  left: 22.5%;
  box-sizing: border-box;
  color: #666;
  top: 48.5%;
  bottom: auto;
  animation: print 0.66s infinite;
}
#printer-404 .paper1 div {
  position: absolute;
  background: #fff;
  top: 9.5%;
  bottom: 9.5%;
  left: 10%;
  right: 10%;
  font-family: monospace;
  text-align: center;
  font-size: 60px;
}
#printer-404 .paper2 {
  width: 55%;
  height: 50%;
  background: #666;
  position: absolute;
  z-index: 4;
  left: 22.5%;
  box-sizing: border-box;
  color: #666;
  bottom: auto;
  top: -5%;
  animation: firstpaper 0.66s;
  z-index: 1;
}
#printer-404 .paper2 div {
  position: absolute;
  background: #fff;
  top: 9.5%;
  bottom: 9.5%;
  left: 10%;
  right: 10%;
  font-family: monospace;
  text-align: center;
  font-size: 60px;
}
#printer-404 .mask {
  background: #666;
  width: 55%;
  height: 32%;
  position: absolute;
  left: 22.5%;
  z-index: 5;
  top: 28%;
}
@keyframes print {
  0% {
    transform: translate3d(0);
    color: #fff;
  }
  5% {
    transform: translate3d(0);
  }
  14% {
    transform: translate3d(0, -25%, 0);
    color: #fff;
  }
  15% {
    color: #666;
  }
  15% {
    transform: translate3d(0-25%0);
  }
  17% {
    transform: translate3d(0-25%0);
  }
  18% {
    transform: translate3d(0-26%0);
  }
  19% {
    transform: translate3d(0-29%0);
  }
  21% {
    transform: translate3d(0-29%0);
  }
  22% {
    transform: translate3d(0-30%0);
  }
  23% {
    transform: translate3d(0-33%0);
  }
  25% {
    transform: translate3d(0-33%0);
  }
  26% {
    transform: translate3d(0-34%0);
  }
  27% {
    transform: translate3d(0-37%0);
  }
  29% {
    transform: translate3d(0-37%0);
  }
  30% {
    transform: translate3d(0-38%0);
  }
  31% {
    transform: translate3d(0-41%0);
  }
  33% {
    transform: translate3d(0-41%0);
  }
  34% {
    transform: translate3d(0-42%0);
  }
  35% {
    transform: translate3d(0-45%0);
  }
  37% {
    transform: translate3d(0-45%0);
  }
  38% {
    transform: translate3d(0-46%0);
  }
  39% {
    transform: translate3d(0-49%0);
  }
  41% {
    transform: translate3d(0-49%0);
  }
  42% {
    transform: translate3d(0-50%0);
  }
  43% {
    transform: translate3d(0-53%0);
  }
  45% {
    transform: translate3d(0-53%0);
  }
  46% {
    transform: translate3d(0-54%0);
  }
  47% {
    transform: translate3d(0-57%0);
  }
  49% {
    transform: translate3d(0-57%0);
  }
  50% {
    transform: translate3d(0-58%0);
  }
  51% {
    transform: translate3d(0-61%0);
  }
  53% {
    transform: translate3d(0-61%0);
  }
  54% {
    transform: translate3d(0-62%0);
  }
  60% {
    transform: translate3d(0, -80%, 0);
  }
  75% {
    transform: translate3d(0, -110%, 0);
  }
  79% {
    transform: translate3d(0, -107%, 0);
  }
  100% {
    transform: translate3d(0, -107%, 0);
  }
}
@keyframes firstpaper {
  0% {
    opacity: 0;
  }
  99% {
    opacity: 0;
  }
  100% {
    opacity: 1;
  }
}
		</style>
	</head>
	<body>
		<div id="printer-404">
		  <div class="back"></div>
		  <div class="body"></div>
		  <div class="front"><div></div></div>
		  <div class="paper1"><div>404</div></div>
		  <div class="paper2"><div>404</div></div>
		  <div class="mask"></div>
		</div>
	</body>
</html>