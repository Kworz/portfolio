// Credit: https://madebyevan.com/shaders/grid/
varying vec2 vUv;
varying vec3 vPosition;

// External vars
uniform vec3 pulsePosition;
uniform float pulseTimer;

void main()
{
    float coord = vPosition.z * 5.0;
    float line = abs(fract(coord - 0.7) - 0.25) / fwidth(coord);

    if (line > 1.0)
    {
        gl_FragColor = vec4(1.0, 0.96, 0.95, 0.9);
    }
    else
    {
        float lineFill = 1.0 - min(line, 1.0);

        float circleGrowTimer = min(pulseTimer * 2., 1.);
        float colorFadeTimer = 1. - pulseTimer;
        float circle = 1.0 - smoothstep(0.9 * circleGrowTimer, 1. * circleGrowTimer, length(pulsePosition.xy - vPosition.xy) * 0.05);

        // bright colors
        vec3 color = vec3(pulsePosition.x * 3.0, pulsePosition.y * 0.3, -pulsePosition.z * 8.0 * colorFadeTimer);
        color = color * colorFadeTimer;
        vec3 coloredLines = (color * colorFadeTimer * lineFill);
        vec3 final = coloredLines = mix(coloredLines, vec3(lineFill * 0.3), 1.- circle * colorFadeTimer);

        gl_FragColor = vec4(final, 1.);
    } 
}