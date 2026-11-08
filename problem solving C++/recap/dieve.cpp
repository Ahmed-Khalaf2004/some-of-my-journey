#include <iostream>
#include <vector>

using namespace std;

vector<int> sieveOfEratosthenes(int n)
{
    vector<bool> is_prime(n + 1, true);
    is_prime[0] = is_prime[1] = false;

    for (int p = 2; p * p <= n; p++)
    {
        if (is_prime[p])
        {
            for (int i = p * p; i <= n; i += p)
            {
                is_prime[i] = false;
            }
        }
    }

    vector<int> primes;
    for (int i = 2; i <= n; i++)
    {
        if (is_prime[i])
        {
            primes.push_back(i);
        }
    }
    return primes;
}

int main()
{
    ios_base::sync_with_stdio(false);
    cin.tie(NULL);

    int n = 30;
    vector<int> primes = sieveOfEratosthenes(n);

    for (int p : primes)
    {
        cout << p << " ";
    }
    cout << "\n";

    return 0;
}