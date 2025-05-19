@extends('layouts.app')

@section('title', 'Home')

@section('content')
<div>
    <div class="background-image-cover" style="background-image:url('{{ asset('img/home/bg-1.webp') }}')">
        <div style="background: rgba(121,156,220, 1); background: linear-gradient(90deg, rgba(121,156,220,0.8) 50%, rgba(255,255,255,0) 100%)">
            <div class="container">
                <div class="row align-items-center min-vh-100">
                    <div class="order-1 order-lg-0 col-lg-7 pb-5 pt-lg-5">
                        <div class="text-center text-lg-start py-5 xl:tw-pe-[20px] xxl:tw-pe-[50px]">
                            <h1 class="rubik tw-leading-[1em] h-custom-1 px-4 px-md-0 mb-4">Unleash Your AI-Powered Social Presence with SparkyAgent</h1>
                            <p class="h-custom-4 px-4 px-md-0 mb-5 pb-2">Build, launch, and monetize your AI agents on Twitter and Telegram—no code needed.</p>

                            <div class="">
                                <a href="mailto:support@sparkpoint.io" class="btn btn-custom-2 px-5 py-3 h-custom-5 tw-rounded-[50px]">Activate My SparkyAgent</a>
                            </div>
                        </div>
                    </div>

                    <div class="order-0 order-lg-1 col-lg-5 pt-5 pb-lg-5">
                        <div class="pt-5 pb-0 pb-lg-5">
                            <div class="tw-px-[30px] sm:tw-px-[100px] md:tw-px-[200px] lg:tw-px-[0]">
                                <img src="{{ asset('img/home/img-1.webp') }}" class="w-100" alt="{{ config('app.name') }}" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="background-image-cover" style="background-image:url('{{ asset('img/home/bg-2.jpg') }}')">
        <div class="container">
            <div class="row justify-content-end align-items-center tw-min-h-[calc(100vh-78px)]">
                <div class="col-md-12 col-lg-10 py-5">
                    <div class="text-center text-md-end pt-4 pb-5 py-sm-5">
                        <p class="font-weight-500 tw-tracking-[-0.05em] tw-leading-[1.2em] lg:tw-leading-[1.1em] h-custom-2 px-4 px-md-0 mb-4">Your Personalized AI, Deployed in Minutes</p>
                        <p class="h-custom-4 px-4 px-md-0 mb-5 pb-2">SparkyAgent lets you turn your idea into a living, breathing social AI. From content creators to brands to communities, anyone can run an always-on, intelligent agent that talks, responds, and grows your presence online.</p>

                        <div class="">
                            <a href="mailto:support@sparkpoint.io" class="btn btn-custom-2 px-5 py-3 h-custom-5 tw-rounded-[50px]">Activate My SparkyAgent</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container py-5">
            <p class="text-center font-weight-500 tw-tracking-[-0.05em] tw-leading-[1.2em] lg:tw-leading-[1.1em] h-custom-2 px-4 px-md-0 mb-4">How It Works</p>

            <div class="row align-items-center mb-4">
                <div class="col-lg-4 col-xl-3 tw-px-[60px] sm:tw-px-[130px] md:tw-px-[220px] lg:tw-ps-[0] lg:tw-pe-[30px] xl:tw-pe-[40px]">
                    <img src="{{ asset('img/home/img-2.webp') }}" class="w-100" alt="{{ config('app.name') }}" />
                </div>

                <div class="col-lg-8 col-xl-9">
                    <div class="font-size-80">
                        <p class="text-center text-lg-start font-weight-500 tw-tracking-[-0.05em] tw-leading-[1.2em] lg:tw-leading-[1.1em] h-custom-2 px-4 px-md-0 mb-4">1. Link Your Social Account</p>
                    </div>

                    <p class="text-center text-lg-start h-custom-4 mb-4">Connect your Twitter (X) or Telegram account to SparkyAgent with just a few clicks. This allows your personal AI agent to interact, post, or reply on your behalf — securely and with full transparency. Your data stays yours.</p>
                </div>
            </div>

            <div class="row align-items-center mb-4">
                <div class="col-lg-4 col-xl-3 tw-px-[60px] sm:tw-px-[130px] md:tw-px-[220px] lg:tw-ps-[0] lg:tw-pe-[30px] xl:tw-pe-[40px]">
                    <img src="{{ asset('img/home/img-3.webp') }}" class="w-100" alt="{{ config('app.name') }}" />
                </div>

                <div class="col-lg-8 col-xl-9">
                    <div class="font-size-80">
                        <p class="text-center text-lg-start font-weight-500 tw-tracking-[-0.05em] tw-leading-[1.2em] lg:tw-leading-[1.1em] h-custom-2 px-4 px-md-0 mb-4">2. Customize Your AI</p>
                    </div>

                    <p class="text-center text-lg-start h-custom-4 mb-4">Set your agent's tone, personality, and purpose — whether it's answering FAQs, promoting content, or engaging your audience 24/7. You have full control over how it speaks and behaves.</p>
                </div>
            </div>

            <div class="row align-items-center mb-4">
                <div class="col-lg-4 col-xl-3 tw-px-[60px] sm:tw-px-[130px] md:tw-px-[220px] lg:tw-ps-[0] lg:tw-pe-[30px] xl:tw-pe-[40px]">
                    <img src="{{ asset('img/home/img-4.webp') }}" class="w-100" alt="{{ config('app.name') }}" />
                </div>

                <div class="col-lg-8 col-xl-9">
                    <div class="font-size-80">
                        <p class="text-center text-lg-start font-weight-500 tw-tracking-[-0.05em] tw-leading-[1.2em] lg:tw-leading-[1.1em] h-custom-2 px-4 px-md-0 mb-4">3. Pay with SRK</p>
                    </div>

                    <p class="text-center text-lg-start h-custom-4 mb-4">Once you’ve customized your agent, simply pay with SRK tokens to activate it. Your access is tied securely to your wallet, time-limited based on your chosen plan, and fully under your control — no subscriptions, just pure on-chain ownership.</p>
                </div>
            </div>

            <div class="row align-items-center mb-5">
                <div class="col-lg-4 col-xl-3 tw-px-[60px] sm:tw-px-[130px] md:tw-px-[220px] lg:tw-ps-[0] lg:tw-pe-[30px] xl:tw-pe-[40px]">
                    <img src="{{ asset('img/home/img-5.webp') }}" class="w-100" alt="{{ config('app.name') }}" />
                </div>

                <div class="col-lg-8 col-xl-9">
                    <div class="font-size-80">
                        <p class="text-center text-lg-start font-weight-500 tw-tracking-[-0.05em] tw-leading-[1.2em] lg:tw-leading-[1.1em] h-custom-2 px-4 px-md-0 mb-4">4. Your AI Agent Goes Live</p>
                    </div>

                    <p class="text-center text-lg-start h-custom-4 mb-4">As soon as payment is confirmed, your AI agent is deployed and running. Watch it go live on your selected platform — engaging followers, answering questions, and building your digital presence like never before.</p>
                </div>
            </div>

            <div class="text-center">
                <a href="mailto:support@sparkpoint.io" class="btn btn-custom-2 px-5 py-3 h-custom-5 tw-rounded-[50px]">Activate My SparkyAgent</a>
            </div>
        </div>
    </div>

    <div class="">
        <div class="container-fluid">
            <div class="row tw-min-h-[calc(100vh-78px)] align-items-stretch">
                <div class="col-lg-7 bg-color-2 d-flex justify-content-end">
                    <div class="lg:tw-max-w-[calc((960px/12)*7)] xl:tw-max-w-[calc((1140px/12)*7)] xxl:tw-max-w-[calc((1320px/12)*7)] w-100 tw-px-[8px]">
                        <div class="h-100 w-100 d-flex align-items-center md:tw-px-[100px] lg:tw-px-[0]">
                            <div class="py-5 pe-lg-5 text-center text-lg-start">
                                <div class="py-5">
                                    <p class="text-center text-lg-start font-weight-500 tw-tracking-[-0.05em] tw-leading-[1.2em] lg:tw-leading-[1.1em] h-custom-2 px-4 px-md-0 mb-5">Why SparkyAgent?</p>

                                    <div class="d-flex flex-column flex-sm-row align-items-center mb-5">
                                        <div class="pe-md-4 pe-md-5 mb-4 mb-sm-0">
                                            <i class="fa-solid fa-check-circle font-size-560 text-color-4"></i>
                                        </div>

                                        <div>
                                            <p class="text-center text-sm-start h-custom-4 font-weight-700 px-4 px-md-0 mb-1">Ownable & Flexible</p>
                                            <p class="text-center text-sm-start h-custom-5 px-4 px-md-0 mb-0">Your AI agent is linked to your wallet and plan — fully transferable and under your control. No subscriptions. No lock-ins.</p>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-column flex-sm-row align-items-center mb-5">
                                        <div class="pe-md-4 pe-md-5 mb-4 mb-sm-0">
                                            <i class="fa-solid fa-check-circle font-size-560 text-color-4"></i>
                                        </div>

                                        <div>
                                            <p class="text-center text-sm-start h-custom-4 font-weight-700 px-4 px-md-0 mb-1">24/7 Autonomous AI</p>
                                            <p class="text-center text-sm-start h-custom-5 px-4 px-md-0 mb-0">Let your custom agent handle replies, DMs, scheduling, and engagement — powered by ElizaOS automation.</p>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-column flex-sm-row align-items-center mb-5">
                                        <div class="pe-md-4 pe-md-5 mb-4 mb-sm-0">
                                            <i class="fa-solid fa-check-circle font-size-560 text-color-4"></i>
                                        </div>

                                        <div>
                                            <p class="text-center text-sm-start h-custom-4 font-weight-700 px-4 px-md-0 mb-1">Private by Design</p>
                                            <p class="text-center text-sm-start h-custom-5 px-4 px-md-0 mb-0">We respect your data. Only essential information is processed to operate your agent efficiently and securely.</p>
                                        </div>
                                    </div>

                                    <div class="d-flex flex-column flex-sm-row align-items-center mb-5">
                                        <div class="pe-md-4 pe-md-5 mb-4 mb-sm-0">
                                            <i class="fa-solid fa-check-circle font-size-560 text-color-4"></i>
                                        </div>

                                        <div>
                                            <p class="text-center text-sm-start h-custom-4 font-weight-700 px-4 px-md-0 mb-1">Fueled by Spark (SRK) Token</p>
                                            <p class="text-center text-sm-start h-custom-5 px-4 px-md-0 mb-0">Use SRK to activate, extend, or manage your agent. Simple, on-chain, and built for the SparkPoint ecosystem.</p>
                                        </div>
                                    </div>

                                    <div class="text-center text-lg-start">
                                        <a href="mailto:support@sparkpoint.io" class="btn btn-custom-2 px-5 py-3 h-custom-5 tw-rounded-[50px]">Activate My SparkyAgent</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5 background-image-cover p-0 tw-min-h-[calc(100vh-78px)] lg:tw-min-h-[initial]" style="background-image:url('{{ asset('img/home/bg-3.webp') }}')"></div>
            </div>
        </div>
    </div>

    <div class="py-5">
        <div class="container py-5">
            <div class="px-2 px-sm-5 px-md-3 px-lg-5">
                <p class="text-center font-weight-500 tw-leading-[1em] h-custom-2 px-4 px-md-0 mb-5 pb-4 pb-lg-0">Use Cases</p>

                <div class="position-relative mb-5">
                    <div class="position-absolute tw-left-[33.3%] h-100 tw-w-[1px] tw-bg-[#000000] d-none d-lg-block"></div>
                    <div class="position-absolute md:tw-left-[50%] lg:tw-left-[66.6%] h-100 tw-w-[1px] d-none d-md-block tw-bg-[#000000]"></div>

                    <div class="row py-md-5">
                        <div class="col-md-6 col-lg-4 mb-5 pb-4 md:tw-px-[40px] xxl:tw-px-[50px]">
                            <div class="font-size-90">
                                <p class="text-center h-custom-2 px-4 px-md-0 mb-1">Creators</p>
                            </div>

                            <p class="text-center h-custom-5 mb-0">Stay connected with fans 24/7. Your agent can reply to comments, answer questions, and post updates — even while you’re offline.</p>
                        </div>

                        <div class="col-md-6 col-lg-4 mb-5 pb-4 md:tw-px-[40px] xxl:tw-px-[50px]">
                            <div class="font-size-90">
                                <p class="text-center h-custom-2 px-4 px-md-0 mb-1">Brands</p>
                            </div>

                            <p class="text-center h-custom-5 mb-0">Automate support, launch campaigns, and keep your brand voice consistent across platforms — all without growing your team.</p>
                        </div>

                        <div class="col-md-6 col-lg-4 mb-5 pb-4 md:tw-px-[40px] xxl:tw-px-[50px]">
                            <div class="font-size-90">
                                <p class="text-center h-custom-2 px-4 px-md-0 mb-1">Communities</p>
                            </div>

                            <p class="text-center h-custom-5 mb-0">Welcome newcomers, answer FAQs, moderate conversations, and boost engagement with an always-on presence.</p>
                        </div>

                        <div class="col-md-6 col-lg-4 mb-5 pb-4 mb-md-0 pb-md-0 md:tw-px-[40px] xxl:tw-px-[50px]">
                            <div class="font-size-90">
                                <p class="text-center h-custom-2 px-4 px-md-0 mb-1">Influencers</p>
                            </div>

                            <p class="text-center h-custom-5 mb-0">Let your AI handle DMs, promote content, and stay engaged with your audience — so you can focus on creating.</p>
                        </div>

                        <div class="col-md-6 col-lg-4 mb-5 pb-4 mb-md-0 pb-md-0 md:tw-px-[40px] xxl:tw-px-[50px]">
                            <div class="font-size-90">
                                <p class="text-center h-custom-2 px-4 px-md-0 mb-1">Entrepreneurs</p>
                            </div>

                            <p class="text-center h-custom-5 mb-0">Use SparkyAgent as a virtual assistant or sales bot — managing inquiries, qualifying leads, and sharing updates on autopilot.</p>
                        </div>

                        <div class="col-md-6 col-lg-4 mb-5 pb-4 mb-md-0 pb-md-0 md:tw-px-[40px] xxl:tw-px-[50px]">
                            <div class="font-size-90">
                                <p class="text-center h-custom-2 px-4 px-md-0 mb-1">Web3 Users</p>
                            </div>

                            <p class="text-center h-custom-5 mb-0">Activate and manage your AI agents using SRK tokens. Everything is on-chain, transferable, and fully under your control.</p>
                        </div>
                    </div>
                </div>

                <div class="text-center pt-4">
                    <a href="mailto:support@sparkpoint.io" class="btn btn-custom-2 px-5 py-3 h-custom-5 tw-rounded-[50px]">Activate My SparkyAgent</a>
                </div>
            </div>
        </div>
    </div>

    <div class="py-5 background-image-cover" style="background-image:url('{{ asset('img/home/bg-1.webp') }}')">
        <div class="container py-5">
            <p class="text-center font-weight-500 tw-leading-[1em] h-custom-2 px-4 px-md-0 mb-5">Get Started Today</p>
            <p class="text-center h-custom-5 mb-3">Activate your SparkyAgent in under 5 minutes — no coding, no complexity.</p>
            <p class="text-center h-custom-5 mb-3">Just bring your vision, tap into the SparkyAgent platform, and power it with SRK tokens.</p>
            <p class="text-center h-custom-5 mb-5 pb-4">Set your AI in motion and start building your smarter digital presence — effortlessly and securely.</p>

            <div class="text-center">
                <a href="mailto:support@sparkpoint.io" class="btn btn-custom-2 px-4 px-sm-5 py-3 h-custom-5 tw-rounded-[50px] tw-w-[100%] sm:tw-w-[initial]">Activate My SparkyAgent</a>
            </div>
        </div>
    </div>
</div>
@endsection
