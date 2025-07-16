

from datetime import datetime


def start_coding():
    print("Starting to code!")


def date():
    current_datetime = datetime.now()
    return current_datetime


def main():
    start_coding()
    print(date())


if __name__ == "__main__":
    main()
