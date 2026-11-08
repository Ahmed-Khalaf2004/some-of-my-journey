"""Bounded WPA2-Personal password audit for a Wi-Fi network you own.

Windows 10/11 + a working Wi-Fi adapter + pywifi required.
The program tests up to 20 user-supplied candidates by attempting association.
"""

import subprocess
import time
from pathlib import Path

try:
    import pywifi
    from pywifi import const
except ImportError:
    print('Install the required module first: py -m pip install pywifi comtypes')
    raise SystemExit(1)

MAX_CANDIDATES = 20
WAIT_SECONDS = 18


def delete_only_target_profile(ssid: str) -> None:
    # Remove a potentially cached correct key for THIS SSID only.
    # Other saved Wi-Fi networks remain untouched.
    subprocess.run(
        ['netsh', 'wlan', 'delete', 'profile', f'name={ssid}'],
        stdout=subprocess.DEVNULL,
        stderr=subprocess.DEVNULL,
        check=False,
    )


def main() -> None:
    print('Only use this on a network you own or are authorized to test.')
    ssid = input('Wi-Fi name (SSID): ').strip()
    if not ssid:
        print('Network name is required.')
        return

    path = Path(__file__).with_name('guesses.txt')
    if not path.is_file():
        print('Create guesses.txt beside this script, one candidate per line.')
        return

    candidates = [line.strip() for line in path.read_text(encoding='utf-8-sig').splitlines()]
    candidates = list(dict.fromkeys(x for x in candidates if 8 <= len(x) <= 63))[:MAX_CANDIDATES]
    if not candidates:
        print('No valid WPA2 passwords found (each must be 8-63 characters).')
        return

    interfaces = pywifi.PyWiFi().interfaces()
    if not interfaces:
        print('No wireless network adapter found.')
        return
    iface = interfaces[0]

    print(f'\nTesting {len(candidates)} candidates on {ssid!r}.')
    print('This will disconnect Wi-Fi and remove the SAVED PASSWORD for this SSID.')
    print('All other saved Wi-Fi networks are left intact.')
    if input('Continue? Type YES: ').strip() != 'YES':
        return

    for index, candidate in enumerate(candidates, 1):
        print(f'[{index}/{len(candidates)}] Trying a candidate...')
        iface.disconnect()
        time.sleep(2)
        delete_only_target_profile(ssid)
        time.sleep(1)

        profile = pywifi.Profile()
        profile.ssid = ssid
        profile.auth = const.AUTH_ALG_OPEN
        profile.akm.append(const.AKM_TYPE_WPA2PSK)
        profile.cipher = const.CIPHER_TYPE_CCMP
        profile.key = candidate

        try:
            saved_profile = iface.add_network_profile(profile)
            iface.connect(saved_profile)
            for _ in range(WAIT_SECONDS):
                time.sleep(1)
                if iface.status() == const.IFACE_CONNECTED:
                    print('\nWi-Fi connected while testing:', candidate)
                    print('IMPORTANT: Check in Windows that the connected SSID is exactly:', ssid)
                    print('If it is, the password is guessable from your candidate list.')
                    return
        except Exception as exc:
            print('Could not complete this attempt:', exc)
        print('No confirmed connection for this candidate.')
        time.sleep(2)

    print('\nNone of these candidates connected successfully.')
    print('This DOES NOT prove the password is strong or impossible to guess.')
    print('Reconnect to your network using your original Wi-Fi password.')


if __name__ == '__main__':
    main()
