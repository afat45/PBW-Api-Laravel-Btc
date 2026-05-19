<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Real-time Cryptocurrency Prices - Top 10 Coins</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Courier New', 'Monaco', monospace;
            background: #0D0D0D;
            min-height: 100vh;
            padding: 20px;
            color: #00FFFF;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        .header {
            text-align: center;
            color: #00FFFF;
            margin-bottom: 40px;
            animation: fadeIn 0.5s ease-in;
            text-shadow: 0 0 10px #00FFFF, 0 0 20px #FF10F0;
        }

        .header h1 {
            font-size: 2.5em;
            margin-bottom: 10px;
            font-weight: 700;
            text-shadow: 0 0 20px #FF10F0, 0 0 40px #FF006E;
        }

        .header p {
            font-size: 1.1em;
            opacity: 0.95;
            margin-bottom: 15px;
            color: #00FFFF;
        }

        .status-info {
            display: flex;
            justify-content: center;
            gap: 30px;
            flex-wrap: wrap;
            margin-top: 15px;
        }

        .status-badge {
            background: rgba(0, 255, 255, 0.1);
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 0.9em;
            backdrop-filter: blur(10px);
            border: 2px solid #00FFFF;
            color: #00FFFF;
            box-shadow: 0 0 10px #00FFFF;
            text-shadow: 0 0 5px #00FFFF;
        }

        .status-badge.live::before {
            content: '● ';
            color: #39FF14;
            animation: pulse 2s infinite;
            text-shadow: 0 0 5px #39FF14;
        }

        .controls {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-bottom: 30px;
        }

        .btn {
            padding: 10px 20px;
            border: none;
            border-radius: 8px;
            font-size: 1em;
            cursor: pointer;
            transition: all 0.3s ease;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .btn-primary {
            background: #1A1A2E;
            color: #FF10F0;
            box-shadow: 0 0 20px #FF10F0, inset 0 0 10px rgba(255, 16, 240, 0.2);
            border: 2px solid #FF10F0;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 0 30px #FF10F0, 0 0 15px #FF006E, inset 0 0 10px rgba(255, 16, 240, 0.4);
            color: #FF006E;
            text-shadow: 0 0 10px #FF10F0;
        }

        .btn-primary:active {
            transform: translateY(0);
        }

        .coins-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 20px;
            margin-bottom: 30px;
        }

        .coin-card {
            background: #1A1A2E;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 0 20px rgba(0, 255, 255, 0.3), inset 0 0 20px rgba(0, 0, 0, 0.5);
            transition: all 0.3s ease;
            animation: fadeIn 0.5s ease-in;
            position: relative;
            overflow: hidden;
            border: 2px solid #00FFFF;
        }

        .coin-card:hover {
            transform: translateY(-8px);
            box-shadow: 0 0 40px rgba(255, 16, 240, 0.5), 0 0 20px rgba(0, 255, 255, 0.3), inset 0 0 20px rgba(0, 0, 0, 0.5);
            border-color: #FF10F0;
        }

        .coin-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(90deg, #FF10F0, #00FFFF, #FF006E);
            box-shadow: 0 0 10px #FF10F0;
        }

        .coin-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .coin-image {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #f0f0f0;
        }

        .coin-info {
            flex: 1;
        }

        .coin-name {
            font-size: 1.1em;
            font-weight: 700;
            color: #FF10F0;
            margin-bottom: 4px;
            text-shadow: 0 0 10px #FF10F0;
        }

        .coin-symbol {
            font-size: 0.85em;
            color: #00FFFF;
            text-transform: uppercase;
            font-weight: 600;
            letter-spacing: 0.5px;
            text-shadow: 0 0 5px #00FFFF;
        }

        .coin-rank {
            background: rgba(0, 255, 255, 0.1);
            color: #FF006E;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 0.8em;
            font-weight: 600;
            white-space: nowrap;
            border: 1px solid #FF006E;
            box-shadow: 0 0 10px #FF006E;
            text-shadow: 0 0 5px #FF006E;
        }

        .coin-price {
            font-size: 2em;
            font-weight: 700;
            color: #00FFFF;
            margin-bottom: 12px;
            font-family: 'Monaco', 'Courier New', monospace;
            text-shadow: 0 0 15px #00FFFF;
        }

        .coin-price-idr {
            font-size: 0.9em;
            font-weight: 600;
            color: #FF10F0;
            margin-bottom: 16px;
            font-family: 'Monaco', 'Courier New', monospace;
            text-shadow: 0 0 10px #FF10F0;
        }

        .coin-change {
            display: flex;
            align-items: center;
            gap: 8px;
            font-size: 1em;
            font-weight: 600;
            margin-bottom: 12px;
        }

        .coin-change.positive {
            color: #39FF14;
            text-shadow: 0 0 10px #39FF14;
        }

        .coin-change.negative {
            color: #FF006E;
            text-shadow: 0 0 10px #FF006E;
        }

        .change-badge {
            background: rgba(0, 0, 0, 0.5);
            padding: 4px 8px;
            border-radius: 6px;
            font-size: 0.9em;
            border: 1px solid currentColor;
            box-shadow: 0 0 10px currentColor;
        }

        .coin-stats {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 12px;
            padding-top: 12px;
            border-top: 2px solid #FF10F0;
        }

        .stat {
            font-size: 0.85em;
        }

        .stat-label {
            color: #00FFFF;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.3px;
            margin-bottom: 4px;
            text-shadow: 0 0 5px #00FFFF;
        }

        .stat-value {
            color: #FF006E;
            font-weight: 700;
            font-size: 1.05em;
            font-family: 'Monaco', 'Courier New', monospace;
            text-shadow: 0 0 10px #FF006E;
        }

        .loading-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            padding: 60px 20px;
            text-align: center;
            color: #00FFFF;
            text-shadow: 0 0 10px #00FFFF;
        }

        .spinner {
            width: 50px;
            height: 50px;
            border: 4px solid rgba(0, 255, 255, 0.3);
            border-top: 4px solid #FF10F0;
            border-radius: 50%;
            animation: spin 1s linear infinite;
            margin-bottom: 20px;
            box-shadow: 0 0 20px #FF10F0, 0 0 10px #00FFFF;
        }

        .error-container {
            background: #1A1A2E;
            border-radius: 12px;
            padding: 30px;
            text-align: center;
            color: #FF006E;
            box-shadow: 0 0 30px rgba(255, 0, 110, 0.3);
            max-width: 500px;
            margin: 60px auto;
            border: 2px solid #FF006E;
        }

        .error-title {
            font-size: 1.5em;
            font-weight: 700;
            margin-bottom: 10px;
            text-shadow: 0 0 10px #FF006E;
        }

        .error-message {
            margin-bottom: 20px;
            color: #00FFFF;
            line-height: 1.6;
            text-shadow: 0 0 5px #00FFFF;
        }

        .error-container .btn-primary {
            color: #FF10F0;
        }

        .footer {
            text-align: center;
            color: #00FFFF;
            font-size: 0.9em;
            padding-top: 40px;
            border-top: 2px solid #FF10F0;
            margin-top: 40px;
            text-shadow: 0 0 5px #00FFFF;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes spin {
            to {
                transform: rotate(360deg);
            }
        }

        @keyframes pulse {
            0%, 100% {
                opacity: 1;
            }
            50% {
                opacity: 0.5;
            }
        }

        @media (max-width: 768px) {
            .header h1 {
                font-size: 1.8em;
            }

            .coins-grid {
                grid-template-columns: 1fr;
            }

            .status-info {
                gap: 15px;
            }

            .status-badge {
                font-size: 0.8em;
                padding: 6px 12px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Top 10 Cryptocurrency Prices</h1>
            <p>Real-time market data from CoinGecko</p>
            <div class="status-info">
                <div class="status-badge live">Live Updates</div>
                <div class="status-badge">Last update: <span id="lastUpdate">--:--:--</span></div>
            </div>
        </div>

        <div class="controls">
            <button class="btn btn-primary" onclick="fetchCryptoPrices()">Refresh Now</button>
        </div>

        <div id="loadingContainer" class="loading-container" style="display: none;">
            <div class="spinner"></div>
            <p>Loading cryptocurrency data...</p>
        </div>

        <div id="errorContainer" style="display: none;"></div>

        <div id="coinsContainer" class="coins-grid"></div>
    </div>

    <div class="footer">
        <p>Data provided by CoinGecko API | Real-time cryptocurrency market tracking</p>
    </div>

    <script>
        const FETCH_URL = '{{ route("crypto.api.prices") }}';
        const UPDATE_INTERVAL = 30000; // 30 seconds
        let updateTimer = null;

        // Format currency with proper notation
        function formatCurrency(value, currency = 'usd') {
            if (value === null || value === undefined || isNaN(value)) {
                return currency === 'idr' ? 'Rp 0' : '$0.00';
            }
            
            const isIDR = currency === 'idr';
            const prefix = isIDR ? 'Rp ' : '$';
            
            if (isIDR) {
                // Format IDR
                if (value >= 1000000000000) {
                    return prefix + (value / 1000000000000).toFixed(2) + 'T';
                } else if (value >= 1000000000) {
                    return prefix + (value / 1000000000).toFixed(2) + 'B';
                } else if (value >= 1000000) {
                    return prefix + (value / 1000000).toFixed(2) + 'M';
                } else if (value >= 1000) {
                    return prefix + (value / 1000).toFixed(2) + 'K';
                } else if (value >= 1) {
                    return prefix + value.toFixed(0);
                } else if (value > 0) {
                    return prefix + value.toFixed(4);
                }
            } else {
                // Format USD
                if (value >= 1000000000) {
                    return prefix + (value / 1000000000).toFixed(2) + 'B';
                } else if (value >= 1000000) {
                    return prefix + (value / 1000000).toFixed(2) + 'M';
                } else if (value >= 1000) {
                    return prefix + (value / 1000).toFixed(2) + 'K';
                } else if (value >= 1) {
                    return prefix + value.toFixed(2);
                } else if (value > 0) {
                    return prefix + value.toFixed(8);
                }
            }
            
            return currency === 'idr' ? 'Rp 0' : '$0.00';
        }

        // Format percentage
        function formatPercent(value) {
            if (value === null || value === undefined || isNaN(value)) return '0.00%';
            return value.toFixed(2) + '%';
        }

        // Display loading state
        function showLoading() {
            document.getElementById('loadingContainer').style.display = 'flex';
            document.getElementById('coinsContainer').innerHTML = '';
            document.getElementById('errorContainer').style.display = 'none';
        }

        // Display error state
        function showError(message) {
            const errorDiv = document.getElementById('errorContainer');
            errorDiv.innerHTML = `
                <div class="error-title">Error</div>
                <div class="error-message">${message}</div>
                <button class="btn btn-primary" onclick="fetchCryptoPrices()">Try Again</button>
            `;
            errorDiv.style.display = 'block';
            document.getElementById('loadingContainer').style.display = 'none';
            document.getElementById('coinsContainer').innerHTML = '';
        }

        // Update last update time
        function updateLastUpdateTime() {
            const now = new Date();
            const hours = String(now.getHours()).padStart(2, '0');
            const minutes = String(now.getMinutes()).padStart(2, '0');
            const seconds = String(now.getSeconds()).padStart(2, '0');
            document.getElementById('lastUpdate').textContent = `${hours}:${minutes}:${seconds}`;
        }

        // Render coin card
        function renderCoinCard(coin) {
            const priceChange = coin.price_change_percentage_24h || 0;
            const isPositive = priceChange >= 0;
            const changeClass = isPositive ? 'positive' : 'negative';
            const changeIcon = isPositive ? '↑' : '↓';

            return `
                <div class="coin-card">
                    <div class="coin-header">
                        <img src="${coin.image}" alt="${coin.name}" class="coin-image" onerror="this.src='https://via.placeholder.com/48'">
                        <div class="coin-info">
                            <div class="coin-name">${coin.name}</div>
                            <div class="coin-symbol">${coin.symbol}</div>
                        </div>
                        <div class="coin-rank">#${coin.market_cap_rank}</div>
                    </div>

                    <div class="coin-price">${formatCurrency(coin.current_price_usd, 'usd')}</div>
                    <div class="coin-price-idr">${formatCurrency(coin.current_price_idr, 'idr')}</div>

                    <div class="coin-change ${changeClass}">
                        <span>${changeIcon}</span>
                        <span class="change-badge">${isPositive ? '+' : ''}${formatPercent(priceChange)}</span>
                    </div>

                    <div class="coin-stats">
                        <div class="stat">
                            <div class="stat-label">Market Cap</div>
                            <div class="stat-value">${formatCurrency(coin.market_cap)}</div>
                        </div>
                        <div class="stat">
                            <div class="stat-label">24h Volume</div>
                            <div class="stat-value">${formatCurrency(coin.total_volume)}</div>
                        </div>
                    </div>
                </div>
            `;
        }

        // Fetch cryptocurrency prices
        async function fetchCryptoPrices() {
            showLoading();

            try {
                const response = await fetch(FETCH_URL, {
                    method: 'GET',
                    headers: {
                        'Accept': 'application/json',
                        'X-Requested-With': 'XMLHttpRequest',
                    }
                });

                if (!response.ok) {
                    throw new Error(`HTTP ${response.status}: ${response.statusText}`);
                }

                const result = await response.json();

                if (!result.success) {
                    throw new Error(result.message || 'Failed to fetch data');
                }

                renderCoins(result.data);
                updateLastUpdateTime();
                document.getElementById('loadingContainer').style.display = 'none';
                document.getElementById('errorContainer').style.display = 'none';

            } catch (error) {
                console.error('Fetch error:', error);
                showError(`Failed to fetch cryptocurrency data: ${error.message}`);
            }
        }

        // Render all coins
        function renderCoins(coins) {
            const container = document.getElementById('coinsContainer');
            container.innerHTML = coins.map(coin => renderCoinCard(coin)).join('');
        }

        // Setup auto-refresh
        function setupAutoRefresh() {
            // Initial fetch
            fetchCryptoPrices();

            // Set up interval
            if (updateTimer) clearInterval(updateTimer);
            updateTimer = setInterval(fetchCryptoPrices, UPDATE_INTERVAL);
        }

        // Cleanup on page unload
        window.addEventListener('beforeunload', () => {
            if (updateTimer) clearInterval(updateTimer);
        });

        // Initialize on page load
        document.addEventListener('DOMContentLoaded', setupAutoRefresh);
    </script>
</body>
</html>
