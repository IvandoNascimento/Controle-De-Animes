<x-layout cabecalho=" ">
        <style>
            html, body {
                background-color: #fff;
                
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links * {
                /*color: #636b6f;*/
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
                margin-top: 30px;
            }
        </style>
    
        <div class="flex-center position-ref ">
            <div class="content">
                <div class="title m-b-md">
                    Sua lista de animes
                </div>

                <div class="links">
                    
                   <span>Crie a sua lista</span>
                   <span>Adicione</span>
                   <span>Remova</span>
                   <span>Ranqueie</span>
                   <span>Compartilhe</span>
                  
                </div>
            </div>
        </div>
</x-layout>
