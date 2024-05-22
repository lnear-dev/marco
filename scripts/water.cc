


/**
 * This file is part of a Lnear project.
 *
 * (c) 2024 Lanre Ajao(lnear)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * .........<-..(`-')_..(`-').._(`-').._....(`-').
 * ...<-.......\(.OO).).(.OO).-/(OO.).-/.<-.(OO.).
 * .,--..)..,--./.,--/.(,------./.,---...,------,)
 * .|..(`-')|...\.|..|..|...---'|.\./`.\.|.../`..'
 * .|..|OO.)|....'|..|)(|..'--..'-'|_.'.||..|_.'.|
 * (|..'__.||..|\....|..|...--'(|...-...||.......'
 * .|.....|'|..|.\...|..|..`---.|..|.|..||..|\..\.
 * .`-----'.`--'..`--'..`------'`--'.`--'`--'.'--'
 */


#include <iostream>
#include <fstream>
#include <filesystem>
#include <string>
#include <string_view>

namespace fs = std::filesystem;
static constexpr std::string_view copyrightInfo = 
R"(
/**
 * This file is part of a Lnear project.
 *
 * (c) 2024 Lanre Ajao(lnear)
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 * .........<-..(`-')_..(`-').._(`-').._....(`-').
 * ...<-.......\(.OO).).(.OO).-/(OO.).-/.<-.(OO.).
 * .,--..)..,--./.,--/.(,------./.,---...,------,)
 * .|..(`-')|...\.|..|..|...---'|.\./`.\.|.../`..'
 * .|..|OO.)|....'|..|)(|..'--..'-'|_.'.||..|_.'.|
 * (|..'__.||..|\....|..|...--'(|...-...||.......'
 * .|.....|'|..|.\...|..|..`---.|..|.|..||..|\..\.
 * .`-----'.`--'..`--'..`------'`--'.`--'`--'.'--'
 */
)";

void prependCopyright(const std::string& filePath) {
    std::ifstream inFile(filePath);
    if (!inFile) {
        std::cerr << "Error: Unable to open file " << filePath << std::endl;
        return;
    }

    std::string fileContents((std::istreambuf_iterator<char>(inFile)), std::istreambuf_iterator<char>());
    inFile.close();

    std::ofstream outFile(filePath);
    if (!outFile) {
        std::cerr << "Error: Unable to open file " << filePath << " for writing" << std::endl;
        return;
    }
    //skip if file is already prepended
    if (fileContents.find("This file is part of a Lnear project.") != std::string::npos) {
        std::cout << "Already prepended to " << filePath << std::endl;
        return;
    }


    bool isPhpFile = (filePath.size() >= 4 && filePath.substr(filePath.size() - 4) == ".php");
    std::size_t insertPos = 0;
    if (isPhpFile) {
        insertPos = fileContents.find("<?php") + 5;
    }
    outFile << fileContents.substr(0, insertPos)
            << std::endl
            << std::string(copyrightInfo)
            << std::endl
            << fileContents.substr(insertPos);
    outFile.close();

    std::cout << "Prepended to " << filePath << std::endl;
    

}

int main(int argc, char* argv[]) {
    if (argc != 2) {
        std::cerr << "Usage: " << argv[0] << " <directory_path>" << std::endl;
        return 1;
    }

    std::string directoryPath = argv[1];

    if (!fs::is_directory(directoryPath)) {
        std::cerr << "Error: " << directoryPath << " is not a valid directory" << std::endl;
        return 1;
    }

    for (const auto& entry : fs::recursive_directory_iterator(directoryPath)) {
        if (entry.is_regular_file()) prependCopyright(entry.path());
    }
    std::cout << "Copyright information prepended successfully." << std::endl;
    return 0;
}
