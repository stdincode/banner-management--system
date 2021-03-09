
## Документация к API
### API URL

    http://localhost:8312/modules
    
## Actions

	/resource - ресурсы
	    доступные поля data = [id:int, name:str]
	/banner - баннеры
	    доступные поля data = [id:int, name:str]
	/ad-place - места
	    доступные поля data = [id:int, name:str, height: int, width: int]
	/tag - тэги
	    доступные поля data = [id:int, name:str]
по ним же получаем соотвественно все данные


## Действия:
Все данные отправляются в формате json

#### Получить информацию:

	http_method: get
	data = ?название поля=значение
	
Примеры:

    get
    data = {"название поля":"значение"}
    http://localhost:8312/modules/resource
    -показать все данные по ресурсам
    
    http://localhost:8312/modules/resource/1
    -показать все данные по ресурсe, id которого равен 1
    
    http://localhost:8312/modules/resource/1?expand=name_ad_places
    -показать все данные по ресурсe, id которого равен 1, а так же данные по места для этого ресурса
    -только для ресурсов и баннеров - показать дополнительную информацию с местами можно указывав параметр expand=name_ad_places

#### Метод получения `n` баннеров по совокупности ресурса и места размещения. С возможностью дополнительно указать один или несколько тегов. Пример:

    http_method: get, post
    data = {"название поля":"значение"}
    http://192.168.2.156:8312/modules/banner/get-banner
    -только для баннеров
    отправляем json формате {
        "resource_id": 31,
        "ad_place_ids":[1],
        "tag_ids":[1]
    }
    -получаем ответ в виде json

#### Создать:

	http_method: post
	data = {"название поля":"значение"}
	
Пример:

    post
    http://localhost:8312/modules/resource
    json
    {"name":"www.site", "ad_place_ids":[1, 2]}
    -создаем ресурс с именем равным "www.site" и добавляем места для ресурса, где 1, 2 id мест
		
#### Обновить:

	http_method: put
	data = {"название поля":"значение"}
	
Пример:

    put
    http://localhost:8312/modules/resource/1
    json
    {"ad_place_ids":[1, 3]}
    -обновляем ресурс с id равным 1 и обновляем места для ресурса, где 1, 3 id мест

#### Удалить:

	http_method: delete
		Пример:
		http://localhost:8312/modules/resource/1
		-удаляем ресурс с id равным 1
		
#### Дополнительные параметры в url:
    
    http_method: get
    data = ?название поля=значение
    
    для сортировки в обратном порядке по id, по умолчанию сортировка по возрастанию id
    ?sort=-id
    
    изменение формата json(по умолчанияю) или xml
    ?format=xml