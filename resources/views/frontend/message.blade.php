@extends('app')
@section('content')
    <link href="https://unpkg.com/tailwindcss@1.4.6/dist/tailwind.min.css" rel="stylesheet" />
    <body>
        <div class=" w-full flex antialiased text-white" style="margin-top: 100px; height: 850px;">
            <main class="flex-grow flex flex-row min-h-0">
                <section
                    class="flex flex-col flex-none overflow-auto w-24 lg:max-w-sm md:w-2/5 transition-all duration-300 ease-in-out">
                    <div class="search-box p-4 flex-none">
                        <form onsubmit="">
                            <div class="relative">
                                <label>
                                    <input
                                        class="rounded-full py-2 pr-6 pl-10 w-full border border-gray-200 bg-gray-700 text-black focus:shadow-md transition duration-300 ease-in"
                                        type="text" value="" placeholder="Search Messenger" />

                                </label>
                             </div>
                        </form>
                    </div>
                    <div class="contacts p-2 flex-1 overflow-y-scroll">
                        @foreach($contacts as $contact )

                        <a href="{{ route('message', $contact->message_from) }}">
                            <div
                                class="flex justify-between items-center p-8 hover:bg-gray-800  hover:opacity-0.1 rounded-lg relative">
                                <div class="w-16 h-16 relative flex flex-shrink-0">
                                    <img class="shadow-md rounded-full w-full h-full object-cover"
                                        src="{{asset('images/images.png')}}" alt="" />
                                </div>
                                <div class="flex-auto min-w-0 ml-4 mr-6 hidden md:block">
                                    <p>{{$contact->message_from}}</p>
                                </div>
                            </div>
                        </a>

                        @endforeach
                    </div>
                </section>

                <section class="flex flex-col flex-auto border-l border-gray-700">
                    <div class="chat-header px-6  py-10 flex flex-row flex-none justify-between items-center shadow "
                        style="background-color: #1c2845;">
                        <div class="flex">
                            <div class="w-12 h-12 mr-4 relative flex flex-shrink-0">
                                <img class="shadow-md rounded-full w-full h-full object-cover"
                                    src="{{asset('images/images.png')}}" alt="" />
                            </div>
                            <div class="text-md">
                                <p class="font-bold">{{$message_to}}</p>
                            </div>
                        </div>
                    </div>
                    <div id="message_area" class="chat-body p-4 flex-1 overflow-y-scroll">
                        {!! $output !!}
                    </div>
                    <div class="chat-footer">
                        <div class="flex flex-row items-center p-10">
                            <button type="button"
                                class="flex flex-shrink-0 focus:outline-none mx-2 block text-blue-600 hover:text-blue-700 w-6 h-6">
                                <svg viewBox="0 0 20 20" class="w-full h-full fill-current">
                                    <path
                                        d="M10,1.6c-4.639,0-8.4,3.761-8.4,8.4s3.761,8.4,8.4,8.4s8.4-3.761,8.4-8.4S14.639,1.6,10,1.6z M15,11h-4v4H9  v-4H5V9h4V5h2v4h4V11z" />
                                </svg>
                            </button>
                            <button type="button"
                                class="flex flex-shrink-0 focus:outline-none mx-2 block text-blue-600 hover:text-blue-700 w-6 h-6">
                                <svg viewBox="0 0 20 20" class="w-full h-full fill-current">
                                    <path
                                        d="M11,13 L8,10 L2,16 L11,16 L18,16 L13,11 L11,13 Z M0,3.99406028 C0,2.8927712 0.898212381,2 1.99079514,2 L18.0092049,2 C19.1086907,2 20,2.89451376 20,3.99406028 L20,16.0059397 C20,17.1072288 19.1017876,18 18.0092049,18 L1.99079514,18 C0.891309342,18 0,17.1054862 0,16.0059397 L0,3.99406028 Z M15,9 C16.1045695,9 17,8.1045695 17,7 C17,5.8954305 16.1045695,5 15,5 C13.8954305,5 13,5.8954305 13,7 C13,8.1045695 13.8954305,9 15,9 Z" />
                                </svg>
                            </button>
                            <button type="button"
                                class="flex flex-shrink-0 focus:outline-none mx-2 block text-blue-600 hover:text-blue-700 w-6 h-6">
                                <svg viewBox="0 0 20 20" class="w-full h-full fill-current">
                                    <path
                                        d="M0,6.00585866 C0,4.89805351 0.893899798,4 2.0048815,4 L5,4 L7,2 L13,2 L15,4 L17.9951185,4 C19.102384,4 20,4.89706013 20,6.00585866 L20,15.9941413 C20,17.1019465 19.1017876,18 18.0092049,18 L1.99079514,18 C0.891309342,18 0,17.1029399 0,15.9941413 L0,6.00585866 Z M10,16 C12.7614237,16 15,13.7614237 15,11 C15,8.23857625 12.7614237,6 10,6 C7.23857625,6 5,8.23857625 5,11 C5,13.7614237 7.23857625,16 10,16 Z M10,14 C11.6568542,14 13,12.6568542 13,11 C13,9.34314575 11.6568542,8 10,8 C8.34314575,8 7,9.34314575 7,11 C7,12.6568542 8.34314575,14 10,14 Z" />
                                </svg>
                            </button>
                            <button type="button"
                                class="flex flex-shrink-0 focus:outline-none mx-4 block text-blue-600 hover:text-blue-700 w-6 h-6">
                                <svg viewBox="0 0 20 20" class="w-full h-full fill-current">
                                    <path
                                        d="M9,18 L9,16.9379599 C5.05368842,16.4447356 2,13.0713165 2,9 L4,9 L4,9.00181488 C4,12.3172241 6.6862915,15 10,15 C13.3069658,15 16,12.314521 16,9.00181488 L16,9 L18,9 C18,13.0790094 14.9395595,16.4450043 11,16.9378859 L11,18 L14,18 L14,20 L6,20 L6,18 L9,18 L9,18 Z M6,4.00650452 C6,1.79377317 7.79535615,0 10,0 C12.209139,0 14,1.79394555 14,4.00650452 L14,8.99349548 C14,11.2062268 12.2046438,13 10,13 C7.790861,13 6,11.2060545 6,8.99349548 L6,4.00650452 L6,4.00650452 Z" />
                                </svg>
                            </button>
                            <div class="flex-grow">
                                <form action="{{ route('message.send', $message_to) }}" method="POST">
                                    @csrf
                                    <label class="flex">
                                        <input
                                            class="rounded-full  py-2 pl-3 pr-10 w-full border border-gray-200 bg-gray-200 focus:bg-white focus:outline-none text-gray-900 focus:shadow-md transition duration-300 ease-in"
                                            type="text" value="" placeholder="Aa" name="message" />
                                        <button type="submit"
                                            class="absoulute top-0 rounded-full ml-4 font-bold mt-2 mr-8 p-6 flex flex-shrink-0 justify-center items-center focus:outline-none bg-blue-800  hover:text-white w-8 h-8">
                                            >
                                        </button>
                                    </label>
                                </form>
                            </div>
                            <button type="button"
                                class="flex flex-shrink-0 focus:outline-none mx-2 block text-blue-600 hover:text-blue-700 w-6 h-6">
                                <svg viewBox="0 0 20 20" class="w-full h-full fill-current">
                                    <path
                                        d="M11.0010436,0 C9.89589787,0 9.00000024,0.886706352 9.0000002,1.99810135 L9,8 L1.9973917,8 C0.894262725,8 0,8.88772964 0,10 L0,12 L2.29663334,18.1243554 C2.68509206,19.1602453 3.90195042,20 5.00853025,20 L12.9914698,20 C14.1007504,20 15,19.1125667 15,18.000385 L15,10 L12,3 L12,0 L11.0010436,0 L11.0010436,0 Z M17,10 L20,10 L20,20 L17,20 L17,10 L17,10 Z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </section>
            </main>
        </div>


    </body>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>

        $(document).ready(function() {

            var userScrolled = false;
            $(".chat-body").scrollTop($(".chat-body")[0].scrollHeight);
            $(".chat-body").on("scroll", function() {
                if ($(this).scrollTop() < $(this)[0].scrollHeight - $(this).height()) {
                    userScrolled = true;
                } else {
                    userScrolled = false;
                }
            });

            setInterval(function() {
                $.ajax({
                    url: "{{ route('message.fetch', $message_to) }}",
                    type: "GET",
                    success: function(response) {
                        $("#message_area").html(response.output);
                        if (!userScrolled) {
                            $(".chat-body").scrollTop($(".chat-body")[0].scrollHeight);
                        }
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            }, 700);

            $('form').submit(function(event) {
                event.preventDefault();

                var formData = $(this).serialize();

                $.ajax({
                    url: $(this).attr('action'),
                    type: $(this).attr('method'),
                    data: formData,
                    success: function(response) {

                    },
                    error: function(xhr, status, error) {

                    }
                });
            });
        });
    </script>

    </html>
@endsection
