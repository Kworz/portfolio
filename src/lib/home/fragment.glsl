// Credit: https://madebyevan.com/shaders/grid/
varying vec2 vUv;
varying vec3 vPosition;
uniform vec3 pulsePosition;
uniform float pulseTimer;

void main()
{
    float coord = vPosition.z * 2.;
    float line = abs(fract(coord - 0.7) - 0.25) / fwidth(coord);
    float lineFill = 1.0 - min(line, 1.0);

    float circleGrowTimer = min(pulseTimer * 2., 1.);
    float colorFadeTimer = 1. - pulseTimer;
    float circle = 1.0 - smoothstep(0.9 * circleGrowTimer, 1. * circleGrowTimer, length(pulsePosition.xy - vPosition.xy) * 0.05);

    // bright colors
    vec3 color = vec3(vPosition.y * 1.5, 1., 1.);
    vec3 coloredLines = (color * colorFadeTimer * lineFill);
    vec3 final = coloredLines = mix(coloredLines, vec3(lineFill * 0.1), 1.- circle * colorFadeTimer);

    gl_FragColor = vec4(final, 1.);
}