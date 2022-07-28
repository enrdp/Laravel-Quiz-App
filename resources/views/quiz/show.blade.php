<x-app-layout>
    <x-slot name="header">

    </x-slot>
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }
        .py-6 {
            padding-top: 0 !important;
            padding-bottom: 0 !important;
        }
        .mt-5, .my-5 {
            margin-top: 0 !important;
            padding-top: 0.4rem;
        }
        .stepwizard-step .btn-circle {
            font-weight: 900;
            font-size: 16px;
            position: relative;
        }
        .stepwizard-step .btn-circle span {
            position: absolute;
            transform: translate(-50%,-50%);
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
        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }
        .m-b-md {
            margin-bottom: 30px;
        }
        .stepwizard-step p {
            margin-top: 10px;
        }
        .stepwizard-row {
            display: table-row;
        }
        .stepwizard {
            display: table;
            width: 100%;
            position: relative;
        }
        .stepwizard-step button[disabled] {
            opacity: 1 !important;
            filter: alpha(opacity=100) !important;
        }
        .stepwizard-row:before {
            top: 14px;
            bottom: 0;
            position: absolute;
            content: " ";
            width: 100%;
            height: 1px;
            background-color: #ccc;
            z-order: 0;
        }
        .stepwizard-step {
            display: table-cell;
            text-align: center;
            position: relative;
        }
        .btn-circle {
            width: 30px;
            height: 30px;
            text-align: center;
            padding: 6px 0;
            font-size: 12px;
            line-height: 1.428571429;
            border-radius: 15px;
        }
        .displayNone{
            display: none;
        }

            .col-md-8 {
                -ms-flex: 0 0 100% !important;
                flex: 0 0 100% !important;
                max-width: 100% !important;
        }
        .container {
            width: 90% !important;
        }
        @media (min-width: 768px) {
            .container, .container-md, .container-sm {
                max-width: 100% !important;
            }
        }
        @media (min-width: 576px) {
            .container, .container-sm {
                max-width: 100% !important;
            }
        }
        @media (min-width: 640px) {
            .container {
                max-width: 100% !important;
            }
        }
    </style>

<div class="container mt-5">
    <div class="row mt-5 justify-content-center ">
        <div class="mt-5 col-md-8">
            <div class="card">
                <div class="card-header bg-success">
                    <h2 class="text-white">Laravel Quiz</h2>
                </div>
                <div class="card-body">

                    @livewire('wizard', ['QuizId' => $QuizId])

                </div>
            </div>
        </div>
    </div>
</div>
@livewireScripts
</x-app-layout>

