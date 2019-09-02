<template>
    <figure>
        <svg class="max-w-full h-auto mx-auto" v-if="mode === 'square'" viewBox="0 0 512 444" width="512" height="444" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
            <defs>
                <path id="a" d="M110 0h220l110 190.526L330 381.05H110L0 190.526z"/>
                <path id="c" d="M110 0l220 381.051H110L0 190.526z"/>
            </defs>
            <g fill="none" fill-rule="evenodd">
                <path fill="#FFF" d="M128 0h256l128 221.703-128 221.702H128L0 221.703z"/>
                <path fill="#000" d="M136 14h240l120 207.846-120 207.846H136L16 221.846z"/>
                <g transform="translate(36 31)">
                    <mask id="b" fill="#fff">
                        <use xlink:href="#a"/>
                    </mask>
                    <use fill="#00B4A9" xlink:href="#a"/>
                    <path fill="#13A89F" mask="url(#b)" d="M330 0l110 190.526L330 381.05H110z"/>
                    <use fill="#00B4A9" xlink:href="#c"/>
                </g>
            </g>
        </svg>
        <svg class="max-w-full h-auto mx-auto" v-if="mode === 'wide'" viewBox="0 0 258 72" width="258" height="72"
             xmlns="http://www.w3.org/2000/svg">
            <g fill="none" fill-rule="evenodd">
                <g stroke-width="2">
                    <path stroke="#FFF"
                          d="M66.192 35.256l-19.227-.204-9.416 16.308 9.79 16.55 19.228.204 9.415-16.309-9.79-16.549z"
                          stroke-linejoin="square" fill="#FFF"/>
                    <path stroke="#000"
                          d="M67.34 33.268l10.959 18.525-10.584 18.333-21.523-.229-10.96-18.525L45.817 33.04l21.523.228z"/>
                    <g>
                        <path stroke="#FFF"
                              d="M31.688 15.262H12.843L3.42 31.582l9.423 16.321h18.845l9.423-16.32-9.423-16.32z"
                              stroke-linejoin="square" fill="#00B4A9"/>
                        <path stroke="#000"
                              d="M32.843 13.262l10.577 18.32-10.577 18.321H11.688L1.111 31.583l10.577-18.32h21.155z"/>
                    </g>
                </g>
                <path
                    d="M65.348 20.897V23H49V0h15.852v2.103H51.444v8.181h11.955v2.07H51.444v8.543h13.904zM72.095 0h2.444v20.897h12.946V23h-15.39V0zm36.8 20.897V23H92.548V0H108.4v2.103H94.992v8.181h11.955v2.07H94.992v8.543h13.903zM139.652 0v23h-2.345V4.6l-9.082 15.476h-1.155l-9.083-15.377V23h-2.344V0h2.014l10.04 17.053L137.637 0h2.015zm24.879 20.897V23h-16.348V0h15.852v2.103h-13.408v8.181h11.955v2.07h-11.955v8.543h13.904zM190.598 0v23h-2.015L173.722 4.337V23h-2.444V0h2.014l14.895 18.663V0h2.41zm13.022 2.103h-8.124V0h18.692v2.103h-8.124V23h-2.444V2.103zm28.808 14.753h-12.88L216.774 23h-2.543L224.8 0h2.411l10.568 23h-2.576l-2.774-6.144zm-.892-1.972L225.988 2.53l-5.548 12.354h11.096zM242.61 0h2.444v20.897H258V23h-15.39V0z"
                    fill="#000" fill-rule="nonzero"/>
            </g>
        </svg>
    </figure>
</template>

<script>
    export default {
        props: {
            mode: String
        }
    }
</script>
