<?php

function noticias_swagger_endpoint()
{

  $data = '{
    "openapi": "3.0.0",
    "info": {
      "title": "API Notícias Agroclima",
      "version": "1.0",
      "description": "API para obter informações do Notícias Agroclima"
    },
    "servers": [
      {
        "url": "https://mvp.climatempo.com.br/agroclima/wp-json/wp/v2",
        "description": "Servidor de PRODUÇÃO"
      },
      {
        "url": "https://mvp.climatempo.io/agroclima/wp-json/wp/v2",
        "description": "Servidor de STAGING"
      },
      {
        "url": "https://mvp.climatempo.dev/agroclima/wp-json/wp/v2",
        "description": "Servidor de DESENVOLVIMENTO"
      }
    ],
    "tags": [
      {
        "name": "Notícias Agroclima",
        "description": "Operações relacionadas a Notícias Agroclima"
      }
    ],
    "paths": {
      "/ct-noticias-agricolas": {
        "get": {
          "tags": ["Notícias Agroclima"],
          "summary": "Obter lista de posts Notícas Agroclima",
          "parameters": [
            {
              "name": "per_page",
              "in": "query",
              "description": "Filtro para buscar posts por página",
              "schema": {
                "type": "string"
              }
            }
          ],
          "responses": {
            "200": {
              "description": "Success",
              "content": {
                "application/json": {
                  "example": [
                    {
                      "id": 38,
                      "date": "2023-09-11 10:49:23",
                      "title": "qefgwqeg",
                      "slug": "qefgwqeg",
                      "content": "wegewg",
                      "excerpt": "wergwe",
                      "thumbnail": "http://localhost:8081/wp-content/uploads/2023/08/cropped-eco-backend-1.jpeg",
                      "categories": [
                        "rweghreherh"
                      ],
                      "tags": [
                        
                      ],
                      "title_seo": "ewggewg",
                      "description_seo": "ewgewgew",
                      "top_news": 1
                    }
                  ]
                }
              }
            }
          }
        }
      },
      "/ct-noticias-agricolas/{id}": {
        "get": {
          "tags": ["Notícias Agroclima"],
          "summary": "Obter um post de Notícas Agroclima por ID",
          "parameters": [
            {
              "name": "id",
              "in": "path",
              "required": true,
              "description": "ID do post",
              "schema": {
                "type": "string"
              }
            }
          ],
          "responses": {
            "200": {
              "description": "Success",
              "content": {
                "application/json": {
                  "example":
                  {
                    "id": 328237,
                    "date": "2015-10-07 12:22:16",
                    "title": "Seca continua no ES e em MG",
                    "slug": "seca-continua-no-es-e-em-mg-8237",
                    "content": "<p>O Brasil entrou na primavera de 2015 vivendo dois extremos climáticos: o centro-norte do país arde em calor, com um quadro de seca e estiagem graves; o Sul do Brasil afunda em chuva.</p>\n<p>O fenômeno El Niño que se observa este ano altera as condições climáticas no Brasil e acentua os extremos climáticos que estamos observando no país. Um dos efeitos do aquecimento anormal do Oceano Pacífico é modificar o deslocamento natural das frentes frias que chegam ao Brasil. Além de mais fracas, quase todas ficam bloqueadas no Sul. No decorrer da primavera, muitas frentes frias atingem a Região Sul do Brasil, que tem muita chuva. Algumas conseguem chegar a São Paulo, ao Rio de Janeiro, ao sul de Minas Gerais. Pouquíssimas vão conseguir chegar ao norte mineiro e ao Espírito Santo.</p>\n<p> </p>\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://www.climatempo.com.br/climapress/galeria/2015/10/d93da4ec6942dcfb4c669b14b43f9d2c.jpg\" alt=\"\" data-time2=\"1444239656\" /></p>\n<p> </p>\n<p> </p>\n<p>A meteorologista Josélia Pegorim comenta o que se pode esperar da chuva no Brasil para os próximos 15 dias.</p>\n<p> </p>\n<p><iframe style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://www.youtube.com/embed/1gxmOFk97ls\" width=\"560\" height=\"315\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\"></iframe></p>\n<p> </p>\n<p> </p>\n<p><a href=\"https://www.youtube.com/watch?v=2yFUUWU1028\">Como o El Niño influencia as frentes frias que chegam ao Brasil?</a></p>\n<p> </p>\n<p> </p>",
                    "excerpt": "",
                    "thumbnail": "https://imagens.climatempo.com.br/climapress/galeria/2015/10/d93da4ec6942dcfb4c669b14b43f9d2c.jpg",
                    "categories": [
                      "Sem categoria"
                    ],
                    "tags": [],
                    "title_seo": "",
                    "description_seo": "",
                    "top_news": 1
                  }
                }
              }
            }
          }
        }
      },
      "/ct-noticias-agricolas/by-slug/{slug}": {
        "get": {
          "tags": ["Notícias Agroclima"],
          "summary": "Obter um post de Notícas Agroclima por slug",
          "parameters": [
            {
              "name": "slug",
              "in": "path",
              "required": true,
              "description": "slug do post",
              "schema": {
                "type": "string"
              }
            }
          ],
          "responses": {
            "200": {
              "description": "Success",
              "content": {
                "application/json": {
                  "example":
                  {
                    "id": 328237,
                    "date": "2015-10-07 12:22:16",
                    "title": "Seca continua no ES e em MG",
                    "slug": "seca-continua-no-es-e-em-mg-8237",
                    "content": "<p>O Brasil entrou na primavera de 2015 vivendo dois extremos climáticos: o centro-norte do país arde em calor, com um quadro de seca e estiagem graves; o Sul do Brasil afunda em chuva.</p>\n<p>O fenômeno El Niño que se observa este ano altera as condições climáticas no Brasil e acentua os extremos climáticos que estamos observando no país. Um dos efeitos do aquecimento anormal do Oceano Pacífico é modificar o deslocamento natural das frentes frias que chegam ao Brasil. Além de mais fracas, quase todas ficam bloqueadas no Sul. No decorrer da primavera, muitas frentes frias atingem a Região Sul do Brasil, que tem muita chuva. Algumas conseguem chegar a São Paulo, ao Rio de Janeiro, ao sul de Minas Gerais. Pouquíssimas vão conseguir chegar ao norte mineiro e ao Espírito Santo.</p>\n<p> </p>\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://www.climatempo.com.br/climapress/galeria/2015/10/d93da4ec6942dcfb4c669b14b43f9d2c.jpg\" alt=\"\" data-time2=\"1444239656\" /></p>\n<p> </p>\n<p> </p>\n<p>A meteorologista Josélia Pegorim comenta o que se pode esperar da chuva no Brasil para os próximos 15 dias.</p>\n<p> </p>\n<p><iframe style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://www.youtube.com/embed/1gxmOFk97ls\" width=\"560\" height=\"315\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\"></iframe></p>\n<p> </p>\n<p> </p>\n<p><a href=\"https://www.youtube.com/watch?v=2yFUUWU1028\">Como o El Niño influencia as frentes frias que chegam ao Brasil?</a></p>\n<p> </p>\n<p> </p>",
                    "excerpt": "",
                    "thumbnail": "https://imagens.climatempo.com.br/climapress/galeria/2015/10/d93da4ec6942dcfb4c669b14b43f9d2c.jpg",
                    "categories": [
                      "Sem categoria"
                    ],
                    "tags": [],
                    "title_seo": "",
                    "description_seo": "",
                    "top_news": 1
                  }
                }
              }
            }
          }
        }
      },
      "/ct-noticias-agricolas/categories/{category}": {
        "get": {
          "tags": ["Notícias Agroclima"],
          "summary": "Obter um post de Notícas Agroclima por category",
          "parameters": [
            {
              "name": "category",
              "in": "path",
              "required": true,
              "description": "category do post",
              "schema": {
                "type": "string"
              }
            }
          ],
          "responses": {
            "200": {
              "description": "Success",
              "content": {
                "application/json": {
                  "example":
                  [{
                    "id": 328237,
                    "date": "2015-10-07 12:22:16",
                    "title": "Seca continua no ES e em MG",
                    "slug": "seca-continua-no-es-e-em-mg-8237",
                    "content": "<p>O Brasil entrou na primavera de 2015 vivendo dois extremos climáticos: o centro-norte do país arde em calor, com um quadro de seca e estiagem graves; o Sul do Brasil afunda em chuva.</p>\n<p>O fenômeno El Niño que se observa este ano altera as condições climáticas no Brasil e acentua os extremos climáticos que estamos observando no país. Um dos efeitos do aquecimento anormal do Oceano Pacífico é modificar o deslocamento natural das frentes frias que chegam ao Brasil. Além de mais fracas, quase todas ficam bloqueadas no Sul. No decorrer da primavera, muitas frentes frias atingem a Região Sul do Brasil, que tem muita chuva. Algumas conseguem chegar a São Paulo, ao Rio de Janeiro, ao sul de Minas Gerais. Pouquíssimas vão conseguir chegar ao norte mineiro e ao Espírito Santo.</p>\n<p> </p>\n<p><img style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"http://www.climatempo.com.br/climapress/galeria/2015/10/d93da4ec6942dcfb4c669b14b43f9d2c.jpg\" alt=\"\" data-time2=\"1444239656\" /></p>\n<p> </p>\n<p> </p>\n<p>A meteorologista Josélia Pegorim comenta o que se pode esperar da chuva no Brasil para os próximos 15 dias.</p>\n<p> </p>\n<p><iframe style=\"display: block; margin-left: auto; margin-right: auto;\" src=\"https://www.youtube.com/embed/1gxmOFk97ls\" width=\"560\" height=\"315\" frameborder=\"0\" allowfullscreen=\"allowfullscreen\"></iframe></p>\n<p> </p>\n<p> </p>\n<p><a href=\"https://www.youtube.com/watch?v=2yFUUWU1028\">Como o El Niño influencia as frentes frias que chegam ao Brasil?</a></p>\n<p> </p>\n<p> </p>",
                    "excerpt": "",
                    "thumbnail": "https://imagens.climatempo.com.br/climapress/galeria/2015/10/d93da4ec6942dcfb4c669b14b43f9d2c.jpg",
                    "categories": [
                      "Sem categoria"
                    ],
                    "tags": [],
                    "title_seo": "",
                    "description_seo": "",
                    "top_news": 1
                  }]
                }
              }
            }
          }
        }
      }
    }
  }';
  wp_reset_postdata();

  return rest_ensure_response(json_decode($data));
}


function register_swagger()
{
  register_rest_route('wp/v2', '/swagger-noticias-agricolas', array(
    'methods' => WP_REST_Server::READABLE,
    'callback' => 'noticias_swagger_endpoint',
  ));
}
add_action('rest_api_init', 'register_swagger');
