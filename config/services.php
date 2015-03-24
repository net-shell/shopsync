<?php

return [

	'microweber' => [
	    'client_id' => env('MW_CLIENT'),
	    'client_secret' => env('MW_SECRET'),
	    'redirect' => url('/auth/callback'),
	    'trusted' => 0
	],

	'ebay' => [
		'sandbox' => [
			'devId' => '00b8cd66-7473-4c3a-895a-ed9c3c92aa56',
			'appID' => 'Netshell-9341-4c3d-b3e0-eed91c0aabab',
			'certID' => 'd0b94e2b-5d30-4792-b7fa-97e5e5c818f2',
			'userToken' => 'AgAAAA**AQAAAA**aAAAAA**UoPnVA**nY+sHZ2PrBmdj6wVnY+sEZ2PrA2dj6wFk4GhDZOGpgydj6x9nY+seQ**n0UDAA**AAMAAA**JjhKfa1R6stdUNaLnakqtq+z2UvJfAnItdDROyuy3Ib86WO+mst+lPrxN+2Knste+KYMX3hv8oRrlEEl5m6WBguWJKMsfmLm89fF3BS0/4KKnnCpFCYrf4/Y/fPA3eJjNpeI89DbroLwHl2qggv4yFSwGrBbFKrpvKG7oDGPZ0gKI9aqjZsMiuhNp0DgXIXby02xVG+OEYCaRe9Tvzh4LKf88fdBc46RnBaqSV6WdYnM11rRBe5wyEUJ2OSnjCvSsM4r1QhdzMkXzI54/L2xm+hZh0XH00E5A9UXe/xAISasH7YB1LlTLIV/+BJuEAHqLplA+huEjeFdPU6d6b5TjiS7s8gYYj56K4fVrJ6wWUF1EQceHJqF+JAaiWOcC52/0n5V8ujRKpQCyUT4zgdgGdVeko9+CQcWW77UnbsazY3Ita9D5TqSmBJ3a0JfIraIyo1Fil/NzGxM0MqLRFm+gzDMgvilUdOoTE+Uh+yt0ye9iv2cAhHzPz/yOn/PEbKdr1AAr4irYT3lIuKkWjWlSVhQpSdMhwLWsWNv+nIS/qIZeP/+TMBQo4h7o2YD8kjDcVJexK1oqcYXS2MJachUma9OxEMneGf9xvztmZU8XYGt1O1xL2+IwuTEgepTs5b8n+31Znd1t899/6fgjRYjOtlLbgi8xp5YCxG71FvMun26gendLZPF22gqbvzJG99JphH0djPezAIWBbJ8Rz+TRLZd9aXy/ApW514z/p4ycnawiKgBZNmXRS6iHS9vd0CI'
		],
		'findingApiVersion' => '1.12.0',
		'tradingApiVersion' => '871',
		'shoppingApiVersion' => '871',
		'halfFindingApiVersion' => '1.2.0'
	],

];
