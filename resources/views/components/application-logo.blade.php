<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 120" {{ $attributes }}>
    <!-- Modern background with gradient -->
    <defs>
      <linearGradient id="bgGradient" x1="0%" y1="0%" x2="100%" y2="100%">
        <stop offset="0%" stop-color="#2563EB" />
        <stop offset="100%" stop-color="#4338CA" />
      </linearGradient>
      <linearGradient id="sunGradient" x1="0%" y1="0%" x2="100%" y2="100%">
        <stop offset="0%" stop-color="#F59E0B" />
        <stop offset="100%" stop-color="#EA580C" />
      </linearGradient>
    </defs>
    
    <!-- Background rounded rectangle with shadow -->
    <rect x="10" y="10" width="380" height="100" rx="20" fill="url(#bgGradient)" />
    
    <!-- Modern House Icon -->
    <path d="M60 35 L90 25 L120 35 L120 85 L60 85 Z" fill="#ffffff" opacity="0.9" />
    <rect x="80" y="60" width="20" height="25" rx="2" fill="url(#bgGradient)" />
    
    <!-- Stylized Sun -->
    <circle cx="45" cy="40" r="15" fill="url(#sunGradient)" />
    <path d="M45 20 L45 15 M65 40 L70 40 M45 60 L45 65 M25 40 L20 40 M60 25 L65 20 M60 55 L65 60 M30 55 L25 60 M30 25 L25 20" stroke="#ffffff" stroke-width="2" stroke-linecap="round" />
    
    <!-- Text with modern font styling -->
    <text x="150" y="60" font-family="Arial, sans-serif" font-size="36" font-weight="bold" letter-spacing="1">
      <tspan fill="#ffffff">touri</tspan><tspan fill="#F59E0B">Stay</tspan>
    </text>
    
    <!-- Updated tagline -->
    <text x="150" y="80" font-family="Arial, sans-serif" font-size="14" fill="#ffffff" font-style="italic" letter-spacing="0.5">Your home wherever you go</text>
    
    <!-- Decorative elements -->
    <circle cx="350" cy="30" r="10" fill="#ffffff" opacity="0.2" />
    <circle cx="370" cy="50" r="5" fill="#ffffff" opacity="0.2" />
    <circle cx="350" cy="70" r="8" fill="#ffffff" opacity="0.2" />
  </svg>