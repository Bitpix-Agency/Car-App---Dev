@extends('layout.app')
@section('title', 'Image Editor')
@section('content')
    <header class="vehicle-header-cls" style="">
        @include('include.navigation')
    </header>

    <script>
        const myEditor = cloudinary.mediaEditor();
        myEditor.update({
            mode: 'inline',
            publicIds: [
                'mew/Travel/assets/03'
            ],
            cloudName: 'product-demos',
            image: {
                steps: [
                    'resizeAndCrop',
                    'imageOverlay',
                    'export'
                ],
                resizeAndCrop: {
                    toggleAspectRatio: true,
                    aspectRatioLock: true,
                    flip: true,
                    rotate: true,
                    presets: [
                        'original',
                        'square',
                        'landscape-16:9',
                        'landscape-4:3',
                        'portrait-3:4',
                        'portrait-9:16'
                    ]
                },
                imageOverlay: {
                    overlays: [
                        {
                            publicId: 'https://app.trade-2-trade.co.uk/images/logo-dark.png',
                            label: '01',
                            transformation: [],
                            placementOptions: [
                                'top_left',
                                'top_right',
                                'bottom_left',
                                'bottom_right',
                                'middle'
                            ]
                        },
                        {
                            publicId: 'https://app.trade-2-trade.co.uk/images/logo-dark.png',
                            label: '02',
                            transformation: [],
                            placementOptions: [
                                'top_left',
                                'top_right',
                                'bottom_left',
                                'bottom_right',
                                'middle'
                            ]
                        },
                        {
                            publicId: 'https://app.trade-2-trade.co.uk/images/logo-dark.png',
                            label: '03',
                            transformation: [],
                            placementOptions: [
                                'top_left',
                                'top_right',
                                'bottom_left',
                                'bottom_right',
                                'middle'
                            ]
                        },
                        {
                            publicId: 'https://app.trade-2-trade.co.uk/images/logo-dark.png',
                            label: '04',
                            transformation: [],
                            placementOptions: [
                                'top_left',
                                'top_right',
                                'bottom_left',
                                'bottom_right',
                                'middle'
                            ]
                        }
                    ]
                },
                export: {
                    quality: [
                        'eco'
                    ],
                    formats: [
                        'jpg',
                        'png',
                        'webp'
                    ],
                    download: true,
                    share: true
                }
            },
            theme: {
                logo: 'https://app.trade-2-trade.co.uk/images/logo-dark.png'
            }
        });
        myEditor.show();
        myEditor.on("export",function(data){
            console.log(data);
        })
    </script>

@endsection
