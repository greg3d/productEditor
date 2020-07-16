# obm v1.0
OBM Controlsystem web application
Gregory Rozenbaum

## Для пользователя
Скопировать содержимое папки builds/prod на сервер, в публичный каталог веб-сервера (www, web-ui, public etc.)

## Как пользоваться разработчику?
Нужно установить Node.js (Npm) и gulp `npm install gulp -g`

Инсталлируем зависимости:
```
npm install
```

Сборка dev:
```
gulp
```

Сборка prod:
```
gulp prod
```

# Changlelog
v1.0: Release for SAT  
v0.9.6beta: Charts upgraded. Not using Chart.js anymore. Pure canvas.  
v0.9.5a: Charts added. Alpha version  
v0.9.3: Translation corrections  
v0.9.2: Settings tags sorting, translation of accelerometer settings  
v0.9.1: Some fixes. Refactored code in some places  
v0.9.0.5: minor changes, Alarm fix  
v0.9.0.0: added intenal alarms.  