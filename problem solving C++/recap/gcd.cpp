#include <iostream>
#include <numeric> // For std::gcd in C++17

// Custom Euclidean Algorithm
long long gcd(long long a, long long b) {
    return b == 0 ? a : gcd(b, a % b);
}

int main() {
    long long a = 48, b = 18;

    // Using custom function
    std::cout << gcd(a, b) << "\n"; // Output: 6

    // Using C++17 built-in
    std::cout << std::gcd(a, b) << "\n"; // Output: 6

    return 0;
}