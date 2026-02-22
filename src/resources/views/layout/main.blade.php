<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'anonymous')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'hacker-green': '#00ff00',
                        'hacker-yellow': '#ffff00',
                        'hacker-red': '#ff0000',
                        'matrix-bg': '#000000',
                        'terminal-bg': '#0a0a0a',
                    }
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Source+Code+Pro:wght@300;400;500;600;700&family=Share+Tech+Mono&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Source Code Pro', monospace;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            background: #000000 !important;
            color: #ffffff;
            overflow-x: hidden;
            min-height: 100vh;
        }
        
        .matrix-bg {
            background: 
                linear-gradient(rgba(0, 255, 0, 0.03) 1px, transparent 1px),
                linear-gradient(90deg, rgba(0, 255, 0, 0.03) 1px, transparent 1px);
            background-size: 30px 30px;
            position: relative;
            overflow: hidden;
            background-color: #000000 !important;
        }
        
        .terminal {
            background: rgba(10, 10, 10, 0.95) !important;
            border: 1px solid #00ff00 !important;
            box-shadow: 
                0 0 30px rgba(0, 255, 0, 0.3),
                inset 0 0 30px rgba(0, 255, 0, 0.1) !important;
            position: relative;
            overflow: hidden;
        }
        
        .terminal::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 1px;
            background: linear-gradient(90deg, transparent, #00ff00, transparent);
            animation: scanline 3s linear infinite;
        }
        
        @keyframes scanline {
            0% { top: 0; }
            100% { top: 100%; }
        }
        
        .glow {
            text-shadow: 0 0 10px #00ff00, 0 0 20px #00ff00 !important;
        }
        
        .hacker-green {
            color: #00ff00 !important;
        }
        
        .hacker-red {
            color: #ff0000 !important;
        }
        
        .hacker-yellow {
            color: #ffff00 !important;
        }
        
        .ascii-art {
            font-family: 'Share Tech Mono', monospace;
            white-space: pre;
            color: #00ff00;
            line-height: 1.2;
            font-size: 8px;
        }
        
        .binary-rain {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: 
                repeating-linear-gradient(0deg, 
                    transparent, 
                    transparent 2px, 
                    rgba(0, 255, 0, 0.05) 2px, 
                    rgba(0, 255, 0, 0.05) 4px);
            animation: rain 20s linear infinite;
            pointer-events: none;
            opacity: 0.3;
            z-index: -1;
        }
        
        @keyframes rain {
            0% { background-position: 0 0; }
            100% { background-position: 0 1000px; }
        }
        
        .hacker-button {
            background: rgba(0, 0, 0, 0.8) !important;
            border: 1px solid #00ff00 !important;
            color: #00ff00 !important;
            padding: 8px 16px;
            position: relative;
            overflow: hidden;
            transition: all 0.3s;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 1px;
            cursor: pointer;
        }
        
        .hacker-button:hover {
            background: rgba(0, 255, 0, 0.1) !important;
            box-shadow: 0 0 20px rgba(0, 255, 0, 0.5) !important;
            transform: translateY(-2px);
        }
        
        .status-dot {
            display: inline-block;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            margin-right: 8px;
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
        
        .data-panel {
            background: rgba(10, 20, 10, 0.8) !important;
            border: 1px solid #00ff00 !important;
            position: relative;
            padding: 15px;
        }
        
        .hacker-input {
            background: rgba(0, 0, 0, 0.9) !important;
            border: 1px solid #00ff00 !important;
            color: #00ff00 !important;
            padding: 10px;
            font-family: 'Source Code Pro', monospace;
            width: 100%;
        }
        
        .hacker-input:focus {
            outline: none;
            box-shadow: 0 0 10px rgba(0, 255, 0, 0.5) !important;
            background: rgba(0, 0, 0, 0.95) !important;
        }
        
        .hacker-select {
            background: rgba(0, 0, 0, 0.9) !important;
            border: 1px solid #00ff00 !important;
            color: #00ff00 !important;
            padding: 8px;
            font-family: 'Source Code Pro', monospace;
            width: 100%;
        }
        
        .hacker-select option {
            background: #000000 !important;
            color: #00ff00 !important;
        }
        
        .hacker-table {
            width: 100%;
            border-collapse: collapse;
            background: rgba(10, 10, 10, 0.9) !important;
        }
        
        .hacker-table th {
            border-bottom: 1px solid #00ff00 !important;
            padding: 10px;
            text-align: left;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 1px;
            background: rgba(0, 20, 0, 0.8) !important;
            color: #00ff00 !important;
        }
        
        .hacker-table td {
            padding: 10px;
            border-bottom: 1px solid rgba(0, 255, 0, 0.2) !important;
            background: rgba(10, 10, 10, 0.9) !important;
            color: #ffffff !important;
        }
        
        .hacker-table tr:hover {
            background: rgba(0, 255, 0, 0.05) !important;
        }
        
        .skill-tag {
            background: rgba(0, 255, 0, 0.1) !important;
            border: 1px solid #00ff00 !important;
            padding: 3px 8px;
            font-size: 11px;
            border-radius: 2px;
            margin-right: 5px;
            display: inline-block;
        }
        
        .level-1 { border-color: #ff0000 !important; color: #ff0000 !important; }
        .level-2 { border-color: #ffff00 !important; color: #ffff00 !important; }
        .level-3 { border-color: #00ff00 !important; color: #00ff00 !important; }
        
        .progress-bar {
            height: 4px;
            background: rgba(0, 255, 0, 0.2) !important;
            overflow: hidden;
            position: relative;
            width: 100%;
        }
        
        .progress-fill {
            height: 100%;
            background: #00ff00 !important;
            position: relative;
            overflow: hidden;
        }
        
        .console-output {
            background: rgba(0, 0, 0, 0.95) !important;
            border: 1px solid #00ff00 !important;
            padding: 15px;
            font-family: 'Share Tech Mono', monospace;
            font-size: 12px;
            line-height: 1.5;
            max-height: 200px;
            overflow-y: auto;
        }
        
        .blink {
            animation: blink 1s infinite;
        }
        
        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
        
        .hacker-nav {
            background: rgba(0, 0, 0, 0.97) !important;
            border-right: 1px solid #00ff00 !important;
        }
        
        .nav-item {
            padding: 10px 15px;
            border-left: 3px solid transparent;
            transition: all 0.3s;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 1px;
            cursor: pointer;
            display: block;
            text-decoration: none;
            color: inherit;
            position: relative;
            background: transparent !important;
        }
        
        .nav-item:hover {
            background: rgba(0, 255, 0, 0.05) !important;
            border-left-color: #00ff00 !important;
        }
        
        .nav-item.active {
            background: rgba(0, 255, 0, 0.1) !important;
            border-left-color: #00ff00 !important;
        }
        
        .flashing-text {
            animation: flashing 2s infinite;
        }
        
        @keyframes flashing {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.3; }
        }
        
        /* Remove all white/light backgrounds */
        .bg-white { background-color: #000000 !important; }
        .bg-gray-50 { background-color: rgba(0, 10, 0, 0.5) !important; }
        .bg-gray-100 { background-color: rgba(0, 15, 0, 0.5) !important; }
        .bg-blue-100 { background-color: rgba(0, 0, 20, 0.5) !important; }
        .bg-green-100 { background-color: rgba(0, 20, 0, 0.5) !important; }
        .bg-yellow-100 { background-color: rgba(20, 20, 0, 0.5) !important; }
        .bg-red-100 { background-color: rgba(20, 0, 0, 0.5) !important; }
        .bg-indigo-100 { background-color: rgba(10, 0, 20, 0.5) !important; }
        .bg-purple-100 { background-color: rgba(15, 0, 20, 0.5) !important; }
        
        /* Fix text colors on dark backgrounds */
        .text-gray-800 { color: #ffffff !important; }
        .text-gray-700 { color: #cccccc !important; }
        .text-gray-600 { color: #999999 !important; }
        .text-gray-500 { color: #666666 !important; }
        .text-gray-400 { color: #555555 !important; }
        
        /* Fix border colors */
        .border-gray-200 { border-color: rgba(0, 255, 0, 0.2) !important; }
        .border-gray-300 { border-color: rgba(0, 255, 0, 0.3) !important; }
        .border-gray-100 { border-color: rgba(0, 255, 0, 0.1) !important; }
        
        /* Remove any remaining light backgrounds */
        .hover\:bg-gray-50:hover { background-color: rgba(0, 10, 0, 0.5) !important; }
        .hover\:bg-gray-100:hover { background-color: rgba(0, 15, 0, 0.5) !important; }
        
        /* Ensure all backgrounds are black/dark */
        *[class*="bg-"]:not(.bg-black):not(.bg-transparent):not(.terminal):not(.data-panel):not(.hacker-button) {
            background-color: #000000 !important;
        }
        
        /* Remove white backgrounds from all elements */
        body, div, section, main, header, footer, article, aside, nav {
            background-color: transparent !important;
        }
        
        /* Scrollable layout classes */
        .content-area {
            display: flex;
            flex-direction: column;
            height: 100vh;
            overflow: hidden;
        }
        
        .fixed-header {
            position: sticky;
            top: 0;
            z-index: 40;
            background-color: #000000 !important;
            border-bottom: 1px solid #00ff00 !important;
        }
        
        .scrollable-main {
            flex: 1;
            overflow-y: auto;
            overflow-x: hidden;
            position: relative;
        }
        
        /* Custom scrollbar styling for hacker theme */
        .scrollable-main::-webkit-scrollbar {
            width: 10px;
        }
        
        .scrollable-main::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0.3);
            border-left: 1px solid rgba(0, 255, 0, 0.1);
        }
        
        .scrollable-main::-webkit-scrollbar-thumb {
            background: rgba(0, 255, 0, 0.3);
            border: 1px solid rgba(0, 255, 0, 0.5);
            border-radius: 2px;
        }
        
        .scrollable-main::-webkit-scrollbar-thumb:hover {
            background: rgba(0, 255, 0, 0.5);
            box-shadow: 0 0 10px rgba(0, 255, 0, 0.3);
        }
        
        /* Firefox scrollbar */
        .scrollable-main {
            scrollbar-width: thin;
            scrollbar-color: rgba(0, 255, 0, 0.3) rgba(0, 0, 0, 0.3);
        }
        
        /* Responsive fixes */
        @media (max-width: 768px) {
            .flex {
                flex-direction: column;
            }
            
            .hacker-nav {
                width: 100%;
                min-height: auto;
                border-right: none;
                border-bottom: 1px solid #00ff00 !important;
            }
            
            .ascii-art {
                font-size: 6px;
            }
            
            .grid-cols-3 {
                grid-template-columns: 1fr;
            }
            
            .grid-cols-2 {
                grid-template-columns: 1fr;
            }
            
            .scrollable-main {
                height: calc(100vh - 160px);
            }
        }
    </style>
</head>
<body class="bg-black matrix-bg">
    @yield('content')
</body>
</html>